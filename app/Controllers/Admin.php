<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use \App\Models\Admin_model;
use \App\Models\Id_model;

class Admin extends Controller{
    public $adminmodel;
    public $idmodel;
    public function __construct()
    {
        $this->adminmodel=new Admin_model();
        $this->idmodel=new Id_model();
        helper(['form']); 
    }

    public function index()
    {
        return view('admin_view');
    }
    public function category()
    {
        $rules=[
            'category'=>'required',
            'pic'=>'required'
        ];
        $catg=['data'=>$this->adminmodel->loaddata()];
        $cat_id_no=$this->idmodel->getcatid();
        //print_r($data);
        if($this->request->getMethod()=='get')
        {
            return view('category_view',$catg);
        }
        else if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
                $file=$this->request->getFile('pic');

                if($file->isValid() && !$file->hasMoved())
                {
                    if($file->move(FCPATH.'category',$file->getRandomName()))
                    {

                        $path=base_url().'category/'.$file->getName();
                        $id = "CAT"."-";
                        $myTime =  date("Ymd-his-");
                        $cat_id=$id.$myTime.$cat_id_no['cat'];
                        print_r($cat_id);
                        $cdata=[
                            'cat_id'=>$cat_id,
                            'name'=>$this->request->getVar('category'),
                            'image'=>$path
                        ];
                        $status=$this->adminmodel->addcat($cdata);
                        if($status)
                        {
                            $cat_id_no['cat']=$cat_id_no['cat']+1;
                            $this->idmodel->update_catid($cat_id_no['cat'],'IDSERIAL');
                            
                            $catg['success']='New Category added!';
                            
                        }
                        else
                        {
                            $catg['error']='New Category not added!';
                        }
                    }
                    else
                    {
                    print_r($file->getErrorString());
                    } 
                }
            }
            else
            {
                $catg['validation']=$this->validator;
            }               
        }
        return view('category_view',$catg);
    }
    

    public function product()
    {
        $rules=[
            'product'=>'required',
            'sprice'=>'required',
            'cprice'=>'required',
            'descr'=>'required',
            'qty'=>'required',
            'unit'=>'required',
            'cat_id'=>'required',
            'pic'=>'required'
        ];
        $catg=[
            'data'=>$this->adminmodel->loaddata(),
            'proddata'=>$this->adminmodel->loadprod()
        ];

        if($this->request->getMethod()=='get')
        {
            return view('product_view',$catg);
        }

        $prod_id_no=$this->idmodel->getprodid();
        
        if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
            $file=$this->request->getFile('pic');

            if($file->isValid() && !$file->hasMoved())
            {
                if($file->move(FCPATH.'product',$file->getRandomName()))
                {

                    $path=base_url().'product/'.$file->getName();
                    $id = "PROD"."-";
                    $myTime =  date("Ymd-his-");
                    $prod_id=$id.$myTime.$prod_id_no['prod'];
                    print_r($prod_id);
                    $cdata=[
                        'prod_id'=>$prod_id,
                        'cat_id'=>$this->request->getVar('cat_id'),
                        'name'=>$this->request->getVar('product'),
                        'sprice'=>$this->request->getVar('sprice'),
                        'cprice'=>$this->request->getVar('cprice'),
                        'descr'=>$this->request->getVar('descr'),
                        'qty'=>$this->request->getVar('qty'),
                        'unit'=>$this->request->getVAr('unit'),
                        'image'=>$path
                    ];
                    print_r($cdata);
                    $status=$this->adminmodel->addprod($cdata);
                    if($status)
                    {
                        $prod_id_no['prod']=$prod_id_no['prod']+1;
                        $this->idmodel->update_prodid($prod_id_no['prod'],'IDSERIAL');
                        
                        $catg['success']='Product is added!';
                    }
                    else
                    {
                        $catg['error']='Product is not added!';
                    }
                }
                else
                {
                print_r($file->getErrorString());
                }                
            }
            }
        }
        return view('product_view',$catg);
    }

    public function edit_prod($prod_id)
    {
        $data=['prod_id'=>$prod_id];
        $rules=[
            'qty'=>'required'
        ];
        //print_r($prod_id);
        if($this->request->getMethod()=='get')
        {
            return view('edit_prod_view',$data);
        }
        else if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
            $qty=$this->request->getVar('qty');
            if($this->adminmodel->edit_prod_model($qty,$prod_id))
            {
                return redirect()->to(base_url('admin/product'));
            }
            }
            else
            {
                $data['validation']=$this->validator;
            }
        }
        return view('edit_prod_view',$data);
    }

    public function service_area()
    {
        $rules=[
            'pincode'=>'required'
        ];
        $data=[
            'pincode_list'=>$this->adminmodel->pincode_list()
        ];
        if($this->request->getMethod()=='post')
        {
            if($this->validate($rules))
            {
                $cdata=[
                'pincode'=>$this->request->getVar('pincode')
                ];
                if($this->adminmodel->add_pincode($cdata))
                {
                    echo 'added';
                }
                else
                {
                    echo 'not added';
                }
            }
            else
            {
                $data['validation']=$this->validator;
            }
        }
        return view('service_area_view',$data);
    }

    public function orders()
    {
        $data=[
            'orders'=>$this->adminmodel->order_detail()
        ];

        return view('orders_view',$data);
    }

    public function status_change($order_id)
    {
        if($this->request->getMethod()=='post')
        {
            $cdata=[
                'status'=>$this->request->getVar('status')
            ];

            $this->adminmodel->update_status($cdata['status'],$order_id);
            return redirect()->to(base_url('admin/orders'));
        }
    }
}