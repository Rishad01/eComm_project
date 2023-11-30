<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\User_model;

class User extends Controller
{
    public $usermodel;

    public function __construct()
    {
        $this->usermodel=new User_model();
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
}