<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>

<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6 ">
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
                <td><a href="<?= base_url('user/profile/') ?><?=$order['user_id'];?>"><?= $order['user_id']; ?></a></td>
                <td><?= $order['order_id']; ?></td>
                <td><?= $order['total_amt']; ?></td>
                <td><form action="<?= base_url('admin/status_change/')?><?=$order['order_id'];?>" method="post">
                    <select name="status"  class="form-select form-select-mb-3 shadow-none" aria-label=".form-select-mb-3 example">
                        <option selected><?= $order['status']; ?></option>
                        <option value="delivered">Delivered</option>
                        <option value="not delivered">Not Delivered</option>
                    </select>

                    <input class="btn btn-primary" type="submit" value="Update" name='submit'>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
     </table>
   <?php endif; ?>
    </div>
  </div>
</div>
<?= $this->endsection() ?>