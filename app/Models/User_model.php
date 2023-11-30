<?php
namespace App\Models;
use CodeIgniter\Model;

class User_model extends Model{

    public function get_user($user_id)
    {
        $builder=$this->db->table('user');
        $builder->select('*');
        $builder->where('user_id',$user_id);
        $result=$builder->get();
        if(count($result->getResultArray())>=1)
        {
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }
}