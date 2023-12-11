<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
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
<?= $this->include('partials/input_style') ?>
<?= $this->endsection() ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($products as $product): ?>
                <form action="<?= base_url('user/cart/')?><?= $product['prod_id'] ?>" method="post">
                <div class="col">
                    <div class="card shadow-sm">
                    <img class="rounded" src="<?= $product['image']; ?>">
                        <div class="card-body">
                            <div class="container text-center">
                                <div class="row">
                                    <div class="col-6">
                                        <h4><?= $product['descr']; ?></h4>
                                    </div>
                                    <div class="col-6">
                                        <h4>&#8377;<?= $product['sprice']; ?>/<?= $product['unit']; ?></h4>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6">
                                    <div class="form">
                                        <input type="number" name="qty" class="form-control shadow-none" id="floatingInput" placeholder="Quantity">
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-secondary">Add to Cart</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
    </div>
                </form>
            <?php endforeach ?> 
    </div>   
        
    </div>
  </div>
</div>
<?= $this->endsection() ?>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <div class="col">
    <div class="card shadow-sm">
    <img width="150px" height="150px" src="<?= $product['image']; ?>">
        <div class="card-body">
            <div class="container text-center">
                <div class="row">
                    <div class="col-6">
                        <h4><?= $product['descr']; ?></h4>
                    </div>
                    <div class="col-6">
                        <h4>&#8377;<?= $product['sprice']; ?>/<?= $product['unit']; ?></h4>
                    </div>
                </div>

                <div class="row">
                    <div class="col-6">
                    <div class="form-floating">
                        <input type="number" name="qty" class="form-control shadow-none" id="floatingInput" >
                        <label for="floatingInput">Quantity</label>
                    </div>
                    </div>
                    <div class="col-6">
                    <div class="btn-group">
                    <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>
    </div>
    