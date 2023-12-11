<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->section('style') ?>
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-6 ">
    <?php if($items): ?>

        <?php foreach($items as $item): ?>
          <?php $detail=$controller->myOtherFunct($item['prod_id']); ?>
          <table class="table">
            <tr>
              <td>
                <img width="100px" height="100px" src="<?= $detail['image']; ?>" alt="product image">
              </td>
              <td>
                <table class="table">
                  <tr>
                    <h5><?= $detail['name']; ?></h5>
                  </tr>
                  <tr>
                    <h4>&#8377;<?= $detail['sprice']; ?>/<?= $detail['unit']; ?></h4>
                  </tr>
                  <tr>
                    <td>
                      <form action="<?= base_url('user/update_cart/') ?><?= $item['trans_id']; ?>" method="post">
                        <div class="form">
                          <label>Quantity</label>
                          <input type="number" name="qty" class="form-control shadow-none" placeholder="<?= $item['qty']; ?>" >
                        </div>

                        <input class="btn btn-primary" type="submit" value="Update" name='submit'>
                      </form>

                    </td>
                  </tr>
                </table>
              </td>
              <td>
              <a href="<?= base_url('user/remove_cart/')?><?= $item['trans_id']; ?>"><button type="button" class="btn btn-primary">Remove</button></a>
              </td>
            </tr>
          </table>
            
        <?php endforeach ?>
        <a href="<?= base_url('user/checkout') ?>"><button type="button" class="btn btn-primary">Checkout</button></a>
    <?php else: ?>
        <h4>your cart is empty!</h4>
    <?php endif ?>
  </div>
</div>
</div>
<?= $this->endsection() ?>