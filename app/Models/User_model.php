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

    public function get_category()
    {
        $builder=$this->db->table('category');
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

    public function get_product($cat_id)
    {
        $builder=$this->db->table('product');
        $builder->select('*');
        $builder->where('cat_id',$cat_id);
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

    public function prod_detail($prod_id)
    {
        $builder=$this->db->table('product');
        $builder->select('*');
        $builder->where('prod_id',$prod_id);
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

    public function addto_cart($data)
    {
        $builder=$this->db->table('trans');
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

    public function cart_items($user_id)
    {
        $builder=$this->db->table('trans');
        $builder->select('*');
        $builder->where('user_id',$user_id);
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

    public function get_item_detail($prod_id)
    {
        $builder=$this->db->table('product');
        $builder->select('name,sprice,image,unit');
        $builder->where('prod_id',$prod_id);
        $result=$builder->get();
        if(count($result->getResultArray())>=1)
        {
            //print_r($result->getRowArray());
            return $result->getRowArray();
        }
        else
        {
            return false;
        }
    }

    public function update_cart_qty($trans_id,$qty)
    {
        $builder=$this->db->table('trans');
        $builder->set('qty',$qty);
        $builder->where('trans_id',$trans_id);
        $builder->update();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function remove_cart_item($trans_id)
    {
        $builder=$this->db->table('trans');
        $builder->where('trans_id',$trans_id);
        $builder->delete();
        if($this->db->affectedRows()==1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function user_addr($user_id)
    {
        $builder=$this->db->table('user');
        $builder->select('addr');
        $builder->where('user_id',$user_id);
        $result=$builder->get();
        return $result->getRowArray();
    }

    public function add_order($data)
    {
        $builder=$this->db->table('finalorder');
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