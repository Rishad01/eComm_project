<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-4 ">
    
            <h4><?= $data['user_id']; ?></h4>
            <h4><?= $data['name']; ?></h4>
            <h4><?= $data['mobile']; ?></h4>
            <h4><?= $data['addr']; ?></h4>
            <h4><?= $data['email']; ?></h4>
        
    </div>
  </div>
</div>
<?= $this->endsection() ?>