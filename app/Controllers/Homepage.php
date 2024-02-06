<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\Signup_model;
use \App\Models\Login_model;
use \App\Models\Id_model;
use \App\Models\User_model;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Homepage extends Controller
{
    public $signupmodel;
    public $loginmodel;
    public $idmodel;
    public $usermodel;
    public $session;
    public function __construct()
    {
        $this->signupmodel=new Signup_model();
        $this->loginmodel=new Login_model();
        $this->idmodel=new Id_model();
        $this->usermodel=new User_model();
        $this->session= \Config\Services::session();
        helper(['form']); 
    }
    public function index()
    {
        return view('homepage_view');
    }

    public function signup()
    {
        $id_no=$this->idmodel->getuserid();
        
        $data=[];
        $rules=[
            'name' => 'required',
            'addr' => 'required',
            'mobile' => 'required|numeric|exact_length[10]',
            'email' => 'required|valid_email',
            'pass' => 'required',
            'cpass' => 'required|matches[pass]'
        ];
        if($this->request->getMethod() == 'get')
        {
            return view('signup_view');
        }
        else if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
                $id = "ID"."-";
                $myTime =  date("Ymd-his-");
                $user_id=$id.$myTime.$id_no['user'];
                $cdata=[
                    'user_id' => $user_id,
                    'name'=> $this->request->getVar('name',FILTER_SANITIZE_STRING),
                    'mobile' => $this->request->getVar('mobile',FILTER_SANITIZE_STRING),
                    'email' => $this->request->getVar('email',FILTER_SANITIZE_STRING),
                    'addr' => $this->request->getVar('addr',FILTER_SANITIZE_STRING),
                    'pass' => password_hash($this->request->getVar('pass'),PASSWORD_DEFAULT)
                ];
                

                if($this->signupmodel->savedata($cdata))
                {
                $save=$this->idmodel->update_userid($id_no['user']+1,'IDSERIAL');
                    
                $data['success']='You have registered successfully';
                }
                else
                {
                    $data['error']='Your e-mail id already exists!';
                }
            }
            else
            {
                $data['validation']=$this->validator;
            }
            return view('signup_view',$data);
        }
    }

    public function login()
    {
        $data=[];
        $rules=[
            
            'email' => 'required|valid_email',
            'pass' => 'required'
        ];

        if($this->request->getMethod() == 'get')
        {
            return view('login_view');
        }
        else if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
                $cdata=[
                    
                    'email' => $this->request->getVar('email',FILTER_SANITIZE_STRING),
                    'pass' => $this->request->getVar('pass')
                ];
                $user_id=$this->loginmodel->check($cdata['email']);
                if($user_id)
                {
                    $hash=$user_id['pass'];
                    if (password_verify($cdata['pass'], $hash))
                    {
                        $this->session->set('logged_user',$user_id['user_id']);
                        //print_r($this->session->get('logged_user'));
                        return redirect()->to(base_url('homepage'));
                    }
                    else
                    {
                        $data['wrongpass']='wrong password';
                    }

                }
                else
                {
                    $data['error']='You are not registered user';
                }
            }
            else
            {
                $data['validation']=$this->validator;
            }
            return view('login_view',$data);
        }
    }

    public function logout()
    {
        
        session()->destroy();

        return redirect()->to(base_url('homepage'));
    }

    public function cart()
    {
        
        if($this->request->getMethod()=='get')
        {
        return view('cart_view');
        
        //print_r($_POST['mydata']) ;

        }
        
        //if ($_SERVER["REQUEST_METHOD"] == "POST") {
          //  $data = $_POST['myData'];
            //print_r($data);
            // Now you can use the $data variable in PHP
        /*elseif($this->request->getMethod()=='POST')
        {
            $data=$this->request->getVar('mydata');
            print_r($data);
           // echo 'hello';
            //$myData['data'] = $this->request->getJSON('mydata');
            // Process your data here
            //echo $_POST['mydata'];
            //return $this->response->setJSON(['status' => 'success', 'message' => 'Data received successfully']);
        }*/
        
    }

    
    
    public function receiveData()
    {
       
        // Get raw input as JSON string
        $jsonString = $this->request->getBody();
        //print_r($jsonString);
        // Decode JSON string to a PHP array
        $jsonData = json_decode($jsonString, true);

        //print_r($jsonData);
        // Check if decoding was successful
        

        // Access the jsonData
        //$yourData = $jsonData['jsonData'];
        //print_r($yourData);
        // Now you can use $yourData in your controller logic

        // Example: Log the received data

        
       // return view('cart_view',$mydata);

       // echo '<script>';
        // Process or save the data as needed
        // ...
        // Send a response back to the client
        //echo $this->request->getVar('myData');
        //return view('check',$myData);
    }

    public function checkout_page()
    {
        $jsonData = $this->request->getVar('jsonData');

        // Decode JSON data to use in your logic
        $decodedData = [
            'items' => json_decode(urldecode($jsonData), true),
            'controller' => $this,
        ];
        //print_r($decodedData);
        return view('checkout_page_view',$decodedData);
    }

    public function myOtherFunct($prod_id)
    {
        $a=$this->usermodel->get_item_detail($prod_id);
        return $a;
    }

    public function get_addr()
    {
        $user_id=$this->session->get('logged_user');
        $data=[
            'address'=>$this->usermodel->user_addr($user_id)
        ];

        return $data['address'];
    }

    public function final_order()
    {
        $addr=null;
        $data=[];
        $rules=[
            
            'email' => 'required|valid_email',
            'pass' => 'required'
        ];
        $serializedData = $this->request->getPost('data');

            // Decode the serialized data
            $arr = urldecode($serializedData);
            parse_str($arr, $arr);
            //print_r($arr['total']);
            $result = null;
            if(!session()->has("logged_user"))
            {
                if($this->validate($rules))
            {
                $cdata=[
                    
                    'email' => $this->request->getVar('email',FILTER_SANITIZE_STRING),
                    'pass' => $this->request->getVar('pass')
                ];
                $user_id=$this->loginmodel->check($cdata['email']);
                if($user_id)
                {
                    $hash=$user_id['pass'];
                    if (password_verify($cdata['pass'], $hash))
                    {
                        //print_r($user_id['user_id']);
                        $addr=$user_id['addr'];
                        session()->set('logged_user',$user_id['user_id']);
                        print_r($this->session->get('logged_user'));
                        //print_r($this->session->get('logged_user'));
                        
                    }
                    else
                    {
                        $data['wrongpass']='wrong password';
                    }

                }
                else
                {
                    $data['error']='You are not registered user';
                }
            }
            }
            
            if($addr==null)
            {
                $addr=$this->request->getVar('del_addr');
            }
            $order_id_no=$this->idmodel->getorderid();
            $id = "ORDER";
            $myTime =  date("Ymdhis");
            $order_id=$id.$myTime.$order_id_no['ordr'];
            $data=[
                'order_id'=>$order_id,
                'user_id'=>$this->session->get('logged_user'),
                'total_amt'=>$arr['total'],
                'del_addr'=>$addr
            ];

            if($this->usermodel->add_order($data))
            {
                $order_id_no['ordr']=$order_id_no['ordr']+1;
                if($this->idmodel->update_orderid($order_id_no['ordr'],'IDSERIAL'))
                    {
                        echo 'updated';
                    }
                    else
                    {
                        echo 'not updated';
                    }
                    echo 'Added';
            }
            else
            {
                echo 'Not Added';
            }
        
        
    
     }

}
