<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/dashboard') ?>

 <div class="container">
  <div class="row justify-content-center">
   <div class="col-md-4 ">
    <div class="form-floating">
        <form action="<?= base_url('admin/edit_prod');?>" method="post">
            <input type="number" name="qty" class="form-control" id="floatingInput" placeholder="Quantity">

            <input class="btn btn-primary" type="submit" value="Edit" name='submit'>
        </form>
     </div>
   </div>
  </div>
 </div>
<?= $this->endsection() ?>