<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/dashboard') ?>
<a href="<?= base_url('admin/addstock');?>">Add Stock</a>
<?= $this->endsection() ?>