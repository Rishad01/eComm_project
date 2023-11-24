<?php
namespace App\Models;
use CodeIgniter\Model;

class Signup_model extends Model{
    public function savedata($data)
    {
        $builder= $this->db->table('user');
        $builder->insert($data);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}