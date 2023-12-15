<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?php $validation= \Config\Services::validation()?>

<div class="container">
<div class="row justify-content-center">
     <?php if(isset($error)): ?>
      <div class="alert alert-danger"><?= $error; ?></div>
     <?php endif;?>
     <?php if(isset($wrongpass)): ?>
      <div class="alert alert-danger"><?= $wrongpass; ?></div>
     <?php endif;?>
<div class="col-md-4">
  <div class="container text-center shadow p-3 mb-5 bg-body-tertiary rounded">
    
  <form action="<?= base_url('homepage/login');?>" method="post">
  <div class="row gy-2 justify-content-center">
    <div class="col-12">
      <h1 class="h3 mb-3 fw-normal">Please login</h1>
    </div>
    
    <div class="col-12">
      <div class="form-floating">
        <input type="email" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="email" value="<?= set_value('email')?>">
        <label for="floatingInput">Email</label>
        <span class="text-danger"><?= $validation->getError('email'); ?></span>
      </div>
    </div>
    
    <div class="col-12">
      <div class="form-floating">
        <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Password" name="pass">
        <label for="floatingPassword">Password</label>
        <span class="text-danger"><?= $validation->getError('pass'); ?></span>
      </div>
    </div>

    <div class="col-8 align-self-center">
    <button class="btn btn-dark py-2" type="submit">Login</button>
    </div>
  </div>
  <div class="col-12">
    <a href="<?= base_url('homepage/signup') ?>">Click here if you are not Registered</a>
  </div>
  </form>
  </div>
</div>
</div>
</div>

<?= $this->endsection() ?>