<?php
namespace App\Models;
use CodeIgniter\Model;

class Login_model extends Model{
    public function check($email)
    {
        $builder= $this->db->table('user');
        $builder->select('user_id,pass');
        $builder->where('email', $email);
        $result=$builder->get();
        if(count($result->getResultArray())==1)
        {
            //print_r($result->getRowArray());
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }

    
}