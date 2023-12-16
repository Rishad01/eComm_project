<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
body{
            background-color: #FBF6EE;
        }
.card:hover{
    transform:scale(1.05);
    transition: 1.05s;
}
a:hover{
    transform:scale(1.05);
    transition: 1.05s;
}
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <?php if(isset($error)): ?>
      <div class="alert alert-danger"><?= $error; ?></div>
     <?php endif;?>
     <?php if(isset($success)): ?>
      <div class="alert alert-success"><?= $success; ?></div>
     <?php endif;?>
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
                <td><?=$prod["prod_id"];?></td>
                <td>
                    <a href="<?= base_url('admin/edit_prod/') ?><?=$prod["prod_id"];?>"><button type="button" class="btn btn-dark">edit</button></a>
                </td>
            </tr>
        <?php endforeach; ?>
     </table>
   <?php endif; ?>

    <h1 class="h3 mb-3 fw-normal">Add Products</h1>
     <form action="<?= base_url('admin/product');?>" enctype="multipart/form-data" method="post">
     <div class="container">
      <div class="row gy-2">
         <div class="col-12">
     <div class="form-floating">
        <input type="text" name="product" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc" value=<?= set_value('product') ?>>
        <label for="floatingInput">Product Name</label>
        <span class="text-danger"><?= $validation->getError('product'); ?></span>

     </div>
     </div>

     <div class="col-12">
     <div class="form-floating">
        <input type="text" name="sprice" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc" value=<?= set_value('sprice') ?>>
        <label for="floatingInput">Selling Price</label>
        <span class="text-danger"><?= $validation->getError('sprice'); ?></span>

     </div>
     </div>

     <div class="col-12">
     <div class="form-floating">
        <input type="text" name="cprice" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc" value=<?= set_value('cprice') ?>>
        <label for="floatingInput">Cost Price</label>
        <span class="text-danger"><?= $validation->getError('cprice'); ?></span>

     </div>
     </div>

     <div class="col-12">
     <div class="form-floating">
        <input type="text" name="descr" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc" value=<?= set_value('descr') ?>>
        <label for="floatingInput">Description</label>
        <span class="text-danger"><?= $validation->getError('descr'); ?></span>

     </div>
     </div>

     <div class="col-12">
     <div class="form-floating">
        <input type="number" name="qty" class="form-control shadow-none" id="floatingInput" placeholder="cement,iron rod,etc" >
        <label for="floatingInput">Quantity</label>
        <span class="text-danger"><?= $validation->getError('qty'); ?></span>

     </div>
     </div>

     <div class="col-12">
     <div class="form-floating">
        <input type="text" name="unit" class="form-control shadow-none" id="floatingInput" placeholder="bags,kg,etc">
        <label for="floatingInput">Unit</label>
        <span class="text-danger"><?= $validation->getError('unit'); ?></span>

     </div>
     </div>

     <div class="col-12">
     <div class="form">
        <p>Enter category</p>
        <?php if($data): ?>
            <select name="cat_id" class="form-select form-control shadow-none" aria-label="Default select example">
            <option selected>Choose Category</option>
            <?php foreach($data as $cat): ?>
                <option value="<?= $cat['cat_id'] ?>"><?= $cat['name'] ?></option>
            <?php endforeach ?>
            </select>
            <span class="text-danger"><?= $validation->getError('cat_id'); ?></span>
        <?php endif ?>
     </div>
     </div>

     <div class="col-12">
     <div class="mb-3">
        <label for="formFile" class="form-label">Add image of Product</label>
        <input class="form-control" type="file" name="pic">
        <span class="text-danger"><?= $validation->getError('pic'); ?></span>
      </div>
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

<?= $this->endsection() ?>