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
<?= $this->include('partials/user_dashboard') ?>

<div class="container">
  <div class="row justify-content-center">
    <div class="col ">
    <?php if($categories): ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($categories as $category): ?>
                <div class="col">
                <div class="card shadow-sm">
                <img class="rounded" src="<?= $category['image']; ?>" alt="category">
                <div class="card-body ">
                    <h4 class="card-text"><?= $category['name']; ?></h4>
                    <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <a href="<?= base_url('user/prod_page/')?><?= $category['cat_id']; ?>" class="btn btn-dark ">View Products</a>
                    </div>
                    </div>
                </div>
                </div>
                </div>
            <?php endforeach ?>
        </div>
        <?php else: ?>
            <h4>No categories added!</h4>
    <?php endif ?>  
  </div>
 </div>
</div>

<?= $this->endsection() ?>