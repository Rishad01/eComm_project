<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>

 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-4 ">
    <div class="form-floating">
        <form action="<?= base_url('admin/edit_prod');?>" method="post">
        <div class="container">
            <div class="row gy-2">
            <div class="col-12">
                <input type="number" name="qty" class="form-control" id="floatingInput" placeholder="Quantity">
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