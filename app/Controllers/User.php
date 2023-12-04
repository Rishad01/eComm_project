<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\User_model;
use \App\Models\Id_model;

class User extends Controller
{
    public $usermodel;
    public $idmodel;

    public function __construct()
    {
        $this->usermodel=new User_model();
        $this->idmodel=new Id_model();
    }
    public function profile($user_id)
    {
        $user=[
            'data'=>$this->usermodel->get_user($user_id)
        ];
        print_r($user);
        return view('profile_view',$user);
    }

    public function category_page()
    {
        $data=[
            'categories'=>$this->usermodel->get_category()
        ];

        return view('category_page_view',$data);
    }

    public function prod_page($cat_id)
    {
        $data=[
            'products'=>$this->usermodel->get_product($cat_id)
        ];
        return view('prod_page_view',$data);
    }

    public function cart($prod_id)
    {
        $trans_id_no=$this->idmodel->gettransid();
        print_r($trans_id_no['trans']);
        $prod_detail=$this->usermodel->prod_detail($prod_id);
        if($this->request->getMethod()=='post')
        {
            $id = "TRANS"."-";
            $myTime =  date("Ymd-his-");
            $trans_id=$id.$myTime.$trans_id_no['trans'];
            print_r($trans_id);
            $cdata=[
                'trans_id'=>$trans_id,
                'prod_id'=>$prod_id,
                'user_id'=>'ID-20231126-094149-2',
                'qty'=>$this->request->getVar('qty'),
                'price'=>$prod_detail['sprice']

            ];
            if($this->usermodel->addto_cart($cdata))
            {
                $trans_id_no['trans']=$trans_id_no['trans']+1;
                print_r($trans_id_no['trans']);
                if($this->idmodel->update_transid($trans_id_no['trans'],'IDSERIAL'))
                        {
                            echo 'updated';
                        }
                        else
                        {
                            echo 'not updated';
                        }
                        echo 'Added';
                return redirect()->to(base_url('user/prod_page/'.$prod_detail['cat_id']));
            }
            else
            {
                echo 'not added to cart';
            }
        }
    }
}