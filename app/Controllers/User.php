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
        $data=$this->usermodel->get_user($user_id);
        return view('profile_view');
    }
}