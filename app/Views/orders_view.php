<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 ">
    <?php if($orders): ?>
    <h4>Categories</h4>
     <table class="table">
        <tr>
            <th>User ID</th>
            <th>Order ID</th>
            <th>Total Amount</th>
            <th>Status</th>
        </tr>
        <?php foreach($orders as $order): ?>
            <tr>
                <td><a href="#"><?= $order['user_id']; ?></a></td>
                <td><?= $order['order_id']; ?></td>
                <td><?= $order['total_amt']; ?></td>
                <td><?= $order['status']; ?></td>
            </tr>
        <?php endforeach; ?>
     </table>
   <?php endif; ?>
    </div>
  </div>
</div>
<?= $this->endsection() ?>