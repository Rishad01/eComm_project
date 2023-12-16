<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
body{
            background-color: #FBF6EE;
        }
.card:hover{
    transform:scale(1.05);
    transition: 1.05s;
}
input:hover{
    transform:scale(1.05);
    transition: 1.05s;
}
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>

 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-4 ">
    <div class="form-floating">
        <form action="<?= base_url('admin/edit_prod/');?><?= $prod_id ?>" method="post">
        <div class="container">
            <div class="row gy-2">
            <div class="col-12">
                <input type="number" name="qty" class="form-control" id="floatingInput" placeholder="Quantity">
                <span class="text-danger"><?= $validation->getError('qty'); ?></span>
            </div>
            <div class="col-12">
                <input class="btn btn-dark" type="submit" value="Edit" name='submit'>
            </div>
            </div>
        </div>
        </form>
     </div>
   </div>
  </div>
 </div>
<?= $this->endsection() ?>