<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?php $validation= \Config\Services::validation()?>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-4 ">
<div class="container text-center shadow p-3 mb-5 bg-body-tertiary rounded">
  <form action="<?= base_url('homepage/signup');?>" method="post">
  <div class="row gy-2 justify-content-center">
  <div class="col-12">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
  </div>
  <div class="col-12">
    <div class="form-floating">
      <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="name">
      <label for="floatingInput">Name</label>
    </div>
    </div>
    <div class="col-12">
    <div class="form-floating">
      <input type="email" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email</label>
    </div>
    </div>
    <div class="col-12">
    <div class="form-floating">
      <input type="Address" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="addr">
      <label for="floatingInput">Address</label>
    </div>
    </div>
    <div class="col-12">
    <div class="form-floating">
      <input type="text" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="mobile">
      <label for="floatingInput">Mobile</label>
    </div>
    </div>
    <div class="col-12">
    <div class="form-floating">
      <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Password</label>
    </div>
    </div>
    <div class="col-12">
    <div class="form-floating">
      <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Password" name="cpass">
      <label for="floatingPassword">Confirm Password</label>
    </div>
    </div>
    <div class="col-12">
    <button class="btn btn-dark w-100 py-2" type="submit">Sign up</button>
    </div>
  </div>
  </form>
</div>
</div>
</div>
</div>

<?= $this->endsection() ?>