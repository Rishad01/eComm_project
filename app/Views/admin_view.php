<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/admin_dashboard') ?>
<a href="<?= base_url('admin/addstock');?>">Add Stock</a>
<?= $this->endsection() ?>