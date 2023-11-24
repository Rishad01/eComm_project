<?php
namespace App\Models;
use CodeIgniter\Model;
 
class Id_model extends Model{
    public function getuserid()
    {
        $builder=$this->db->table('serial');
        $builder->select('user')->limit(1);        //$row = $this->db->select("*")->limit(1)->order_by('id',"DESC")->get("table name")->row();
        $result=$builder->get();
        if(count($result->getRowArray())==1)
        {
            //print_r( $result->getRowArray());
            return $result->getRowArray();
        }
        else
        {
            return false;
        }

    }
}