<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<div class="container">
    <div class="row justify-content-center">
    <div class="col">

    
<?php if($data): ?>
    <h1 class="h4 mb-3 fw-normal">Categories</h1>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach($data as $cat): ?>
        <div class="col">
                <div class="card shadow-sm">
                <img class="rounded" src="<?= $cat['image']; ?>" alt="category">
                <div class="card-body ">
                    <h4 class="card-text"><?= $cat['name']; ?></h4>
                </div>
                </div>
        </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<hr>

    <h1 class="h4 mb-3 fw-normal">Add Categories</h1>
        
     <form action="<?= base_url('admin/category');?>" enctype="multipart/form-data" method="post">
     <div class="container">
     <div class="row gy-2">
      <div class="col-12">
      <div class="form-floating">
        <input type="text" name="category" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Category Name</label>
      </div>
      </div>

    <div class="col-12"> 
        <input type="file" name="pic" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc">
        <span class="text-danger"><?= $validation->getError('pic'); ?></span>
    </div>
      <div class="col-6 align-self-end">
      <div class="btn-group">
      <input class="btn btn-dark" type="submit" value="Add" name='submit'>
      </div>
      </div>
      </div>
      </div>
     </form>
     
    </div>
</div>
</div>

<?= $this->endsection() ?>