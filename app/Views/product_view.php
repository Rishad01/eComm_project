<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-4 ">

  <?php if($proddata): ?>
    <h4>Categories</h4>
     <table class="table">
        <tr>
            <th>Name</th>
            <th>Image</th>
            <th>Selling Price</th>
            <th>Cost Price</th>
            <th>Qty</th>
            <th>Add Product</th>
        </tr>
        <?php foreach($proddata as $prod): ?>
            <tr>
                <td><?= $prod['name']; ?></td>
                <td><img height="50px" width="50px" src="<?= $prod['image']; ?>"></td>
                <td><?= $prod['sprice']; ?></td>
                <td><?= $prod['cprice']; ?></td>
                <td><?= $prod['qty']; ?></td>
                <td>
                    <a href="<?= base_url('admin/edit_prod/') ?><?=$prod["prod_id"];?>"><button type="button" class="btn btn-primary">edit</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
     </table>
   <?php endif; ?>

    <h1 class="h3 mb-3 fw-normal">Add Products</h1>
     <form action="<?= base_url('admin/product');?>" enctype="multipart/form-data" method="post">
      
     <div class="form-floating">
        <input type="text" name="product" class="form-control" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Product Name</label>
     </div>

     <div class="form-floating">
        <input type="text" name="sprice" class="form-control" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Selling Price</label>
     </div>

     <div class="form-floating">
        <input type="text" name="cprice" class="form-control" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Cost Price</label>
     </div>

     <div class="form-floating">
        <input type="text" name="descr" class="form-control" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Description</label>
     </div>

     <div class="form-floating">
        <input type="number" name="qty" class="form-control" id="floatingInput" placeholder="cement,iron rod,etc">
        <label for="floatingInput">Quantity</label>
     </div>

     <div class="form-floating">
        <input type="text" name="unit" class="form-control" id="floatingInput" placeholder="bags,kg,etc">
        <label for="floatingInput">Unit</label>
     </div>

     <div>
        <p>Enter category</p>
        <?php if($data): ?>
            <select name="cat_id" class="form-select" aria-label="Default select example">
            <option selected>Choose Category</option>
            <?php foreach($data as $cat): ?>
                <option value="<?= $cat['cat_id'] ?>"><?= $cat['name'] ?></option>
            <?php endforeach ?>
            </select>
        <?php endif ?>
     </div>

     <div class="mb-3">
        <label for="formFile" class="form-label">Add image of Product</label>
        <input class="form-control" type="file" name="pic">
        <span class="text-danger"><?= $validation->getError('pic'); ?></span>
      </div>

      
      <input class="btn btn-primary" type="submit" value="Add" name='submit'>
     </form>
  </div>
  </div>
</div>

<?= $this->endsection() ?>