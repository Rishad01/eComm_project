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

    
<?php if($data): ?>
    <h4>Categories</h4>
<table class="table">
    <tr>
        <th>Name</th>
        <th>Image</th>
    </tr>
    <?php foreach($data as $cat): ?>
        <tr>
            <td><?= $cat['name']; ?></td>
            <td><img height="50px" width="50px" src="<?= $cat['image']; ?>"</td>
        </tr>
    <?php endforeach; ?>
</table>
<?php endif; ?>


    <h1 class="h3 mb-3 fw-normal">Add Categories</h1>
     <form action="<?= base_url('admin/category');?>" enctype="multipart/form-data" method="post">
      
      <div class="form-floating">
        <input type="text" name="category" class="form-control" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Category Name</label>
     </div>

     <div class="mb-3">
        <label for="formFile" class="form-label">Add image of category</label>
        <input class="form-control" type="file" name="pic">
        <span class="text-danger"><?= $validation->getError('pic'); ?></span>
      </div>
      
      <input class="btn btn-primary" type="submit" value="Add" name='submit'>
     </form>
    </div>
</div>
</div>

<?= $this->endsection() ?>