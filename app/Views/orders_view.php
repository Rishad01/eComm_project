<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
input{
  margin:10px;
}
body{
            background-color: #FBF6EE;
        }
col{
  background-color: #FBF6EE;
}
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
    <?php if($orders): ?>
      <div class="container text-center">
        <div class="row">
          <h4>Orders</h4>
        </div>
        <br>
        <div class="row">
          <div class="col-3">
            <h5>User ID</h5>
          </div>
          <div class="col-3">
            <h5>Order ID</h5>
          </div>
          <div class="col-3">
            <h5>Total Amount</h5>
          </div>
          <div class="col-3">
            <h5>Status</h5>
          </div>
        </div>
        <?php foreach($orders as $order): ?>
          <div class="row">
                <div class="col-3">
                  <a class="link-body-emphasis" href="<?= base_url('user/profile/') ?><?=$order['user_id'];?>"><?= $order['user_id']; ?></a>
                </div>
                <div class="col-3">
                  <?= $order['order_id']; ?>
                </div>
                <div class="col-3">
                  <?= $order['total_amt']; ?>
                </div>
                <div class="col-3"><form action="<?= base_url('admin/status_change/')?><?=$order['order_id'];?>" method="post">
                    <select name="status"  class="form-select form-select-mb-3 shadow-none" aria-label=".form-select-mb-3 example">
                        <option selected><?= $order['status']; ?></option>
                        <option value="delivered">Delivered</option>
                        <option value="not delivered">Not Delivered</option>
                    </select>
                    <input id="input_button" class="btn btn-dark" type="submit" value="Update" name='submit'>
                    </form>
                </div>
          </div>
          <hr>
        <?php endforeach; ?>
     </div>
   <?php endif; ?>
    </div>
  </div>
</div>
<?= $this->endsection() ?>