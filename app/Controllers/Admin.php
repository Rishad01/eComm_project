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
    }

    public function index()
    {
        return view('admin_view');
    }
    public function category()
    {
        $catg=['data'=>$this->adminmodel->loaddata()];
        $cat_id_no=$this->idmodel->getcatid();
        //print_r($data);
        if($this->request->getMethod()=='post')
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
                        if($this->idmodel->update_catid($cat_id_no['cat'],'CATSERIAL'))
                        {
                            echo 'updated';
                        }
                        else
                        {
                            echo 'not updated';
                        }
                        echo 'Added';
                    }
                    else{
                        echo 'not added';
                    }
                }
                else
                {
                print_r($file->getErrorString());
                }                
            }
        }
        return view('category_view',$catg);
    }

    public function product()
    {
        $catg=[
            'data'=>$this->adminmodel->loaddata(),
            'proddata'=>$this->adminmodel->loadprod()
        ];

        $prod_id_no=$this->idmodel->getprodid();
        
        if($this->request->getMethod()=='post')
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
                        'name'=>$this->request->getVar('product'),
                        'sprice'=>$this->request->getVar('sprice'),
                        'cprice'=>$this->request->getVar('cprice'),
                        'descr'=>$this->request->getVar('descr'),
                        'qty'=>$this->request->getVar('qty'),
                        'cat_id'=>$this->request->getVar('cat_id'),
                        'image'=>$path
                    ];
                    print_r($cdata);
                    $status=$this->adminmodel->addprod($cdata);
                    if($status)
                    {
                        if($this->idmodel->update_prodid($prod_id_no['prod'],'PRODSERIAL'))
                        {
                            echo 'updated';
                        }
                        else
                        {
                            echo 'not updated';
                        }
                        echo 'Added';
                    }
                    else{
                        echo 'not added';
                    }
                }
                else
                {
                print_r($file->getErrorString());
                }                
            }
        }
        return view('product_view',$catg);
    }

    public function edit_prod($prod_id)
    {
        print_r($prod_id);
        if($this->request->getMethod()=='post')
        {
            $qty=$this->request->getVar('qty');
            if($this->adminmodel->edit_prod($qty,$prod_id))
            {
                return redirect()->to(base_url('admin/product'));
            }
        }
        return view('edit_prod_view');
    }

    public function service_area()
    {
        $data=[
            'pincode_list'=>$this->adminmodel->pincode_list()
        ];
        if($this->request->getMethod()=='post')
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
        return view('service_area_view',$data);
    }
}