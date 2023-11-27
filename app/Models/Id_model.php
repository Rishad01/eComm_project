<?php
namespace App\Models;
use CodeIgniter\Model;
 
class Id_model extends Model{
    public function getuserid()
    {
        $builder=$this->db->table('serial_no');
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

    public function update_prodid($user,$id)
    {
        $builder=$this->db->table('serial_no');
        $builder->set('user',$user);
        $builder->where('id',$id);
        $builder->update();
        //$builder->where('id',$id);
        //$builder->update('user',$user);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
        print_r($user);
    }
}