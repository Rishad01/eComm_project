<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\Signup_model;
use \App\Models\Login_model;
use \App\Models\Id_model;

class Homepage extends Controller
{
    public $signupmodel;
    public $loginmodel;
    public $idmodel;
    public $session;
    public function __construct()
    {
        $this->signupmodel=new Signup_model();
        $this->loginmodel=new Login_model();
        $this->idmodel=new Id_model();
        $this->session= \Config\Services::session();
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
            'cpass' => 'required|matches[password]'
        ];
        if($this->request->getMethod() == 'get')
        {
            return view('signup_view');
        }
        else if($this->request->getMethod()=='post')
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
                if($this->idmodel->update_userid($id_no['user']+1,'IDSERIAL'))
                {
                    echo 'updated';
                }
                else
                {
                    echo 'not updated';
                }
                    echo 'registered';
                }
           
        }
        return view('signup_view');
    }

    public function login()
    {
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
                    return redirect()->to(base_url('homepage'));
                }
                else
                {
                    echo 'wrong password';
                }

            }
            else
            {
                echo 'u r not registered';
            }
            
        }
        return view('login_view');
    }

    public function logout()
    {
        session()->remove('logged_user');
        session()->destroy();

        return redirect()->to(base_url('homepage'));
    }
}
