<?php
namespace App\Models;
use CodeIgniter\Model;
 
class Admin_model extends Model{
    public function addcat($cdata)
    {
        $builder=$this->db->table('category');
        $builder->insert($cdata);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function loaddata()
    {
        $builder=$this->db->table('category');
        $builder->select('cat_id,name,image');
        $result=$builder->get();
        if(count($result->getResultArray())>=1)
        {
            return $result->getResultArray();
        }
        else
        {
            return false;
        }
    }

    public function addprod($cdata)
    {
        $builder=$this->db->table('product');
        $builder->insert($cdata);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function loadprod()
    {
        $builder=$this->db->table('product');
        $builder->select('prod_id,name,image,sprice,cprice,qty');
        $result=$builder->get();
        if(count($result->getResultArray())>=1)
        {
            return $result->getResultArray();
        }
        else
        {
            return false;
        }
    }

    public function edit_prod($qty,$prod_id)
    {
        $builder=$this->db->table('product');
        $builder->select('qty');
        $builder->where('prod_id',$prod_id);
        $result=$builder->get();
        print_r($result);
        return true;

    }

    public function pincode_list()
    {
        $builder=$this->db->table('pincode_list');
        $builder->select('pincode');
        $result=$builder->get();
        if(count($result->getResultArray())>=1)
        {
            return $result->getResultArray();
        }
        else
        {
            return false;
        }
    }

    public function add_pincode($cdata)
    {
        $builder=$this->db->table('pincode_list');
        $builder->insert($cdata);
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function order_detail()
    {
        $builder=$this->db->table('finalorder');
        $builder->select('*');
        $result=$builder->get();
        if(count($result->getResultArray())>=1)
        {
            return $result->getResultArray();
        }
        else
        {
            return false;
        }
    }

    public function update_status($status,$order_id)
    {
        $builder=$this->db->table('finalorder');
        $builder->set('status',$status);
        $builder->where('order_id',$order_id);
        $builder->update();
    }
}