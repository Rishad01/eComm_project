<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
body{
            background-color: #FBF6EE;
        }
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-4 ">
  <?php if($pincode_list): ?>
     <table class="table">
        <tr>
            <th>We deliver at pincodes mentioned below!</th>
        </tr>
        <?php foreach($pincode_list as $pincode): ?>
            <tr>
                <td><?= $pincode['pincode']; ?></td>
            </tr>
        <?php endforeach; ?>
     </table>
     <?php else: ?>
        <h4>No Pincodes Added</h4>
   <?php endif; ?>

   <h1 class="h3 mb-3 fw-normal">Add Pincode</h1>
   <div class="form-floating">
    
        <form action="<?= base_url('admin/service_area');?>" method="post">
        <div class="container">
            <div class="row gy-2">
            <div class="col-12">
                <input type="text" name="pincode" class="form-control shadow-none" id="floatingInput" placeholder="PINCODE">
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