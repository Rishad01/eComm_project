<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
body{
            background-color: #FBF6EE;
        }

<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-4 ">
  <?php if($pincode_list): ?>
     
    <div class="container text-center"></div>
    <div class="row align-content-center justify-content-center">
            <div class="col-12">
                <h1 class="h3 mb-3 fw-normal">We deliver at pincodes mentioned below!</h1>
            </div>
        <?php foreach($pincode_list as $pincode): ?>
            <div class="col-10 align-self-center">
                <h5><?= $pincode['pincode']; ?></h5>
            </div>
        <?php endforeach; ?>
     <?php else: ?>
            <div class="col-12">
                <h4>No Pincodes Added</h4>
            </div>
            </div>
            </div>
   <?php endif; ?>

   <h1 class="h3 mb-3 fw-normal">Add Pincode</h1>
   <div class="form-floating">
    
        <form action="<?= base_url('admin/service_area');?>" method="post">
        <div class="container">
            <div class="row gy-2">
            <div class="col-12">
                <input type="text" name="pincode" class="form-control shadow-none" id="floatingInput" placeholder="PINCODE">
                <span class="text-danger"><?= $validation->getError('pincode'); ?></span>
            </div>
            <div class="col-12">
                <input class="btn btn-dark" type="submit" value="Add" name='submit'>
            </div>
            </div>
            </div>
        </form>
     </div>
  </div>
  </div>
</div>
<?= $this->endsection() ?>