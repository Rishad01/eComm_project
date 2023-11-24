<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?php $validation= \Config\Services::validation()?>

<div class="container">
<div class="row justify-content-center">
<div class="col-md-4 ">
  <form action="<?= base_url('homepage/signup');?>" method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign up</h1>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="name">
      <label for="floatingInput">Name</label>
    </div>
    <div class="form-floating">
      <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email">
      <label for="floatingInput">Email</label>
    </div>
    <div class="form-floating">
      <input type="Address" class="form-control" id="floatingInput" placeholder="name@example.com" name="addr">
      <label for="floatingInput">Address</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="mobile">
      <label for="floatingInput">Mobile</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Password</label>
    </div>

    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="cpass">
      <label for="floatingPassword">Confirm Password</label>
    </div>

    <button class="btn btn-dark w-100 py-2" type="submit">Sign up</button>
  </form>
</div>
</div>
</div>

<?= $this->endsection() ?>