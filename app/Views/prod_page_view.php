<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
        
            <?php foreach($products as $product): ?>
                <form action="<?= base_url('user/cart/')?><?= $product['prod_id'] ?>" method="post">
                <table class="table">
                    <tr>
                        <td><img width="150px" height="150px" src="<?= $product['image']; ?>"></td>
                    <td>
                        <table class="table">
                            <tr>
                                <td>&#8377;<?= $product['sprice']; ?>/<?= $product['unit']; ?></td>
                                <td>
                                    <div class="form-floating">
                                        <input type="number" name="qty" class="form-control" id="floatingInput" >
                                        <label for="floatingInput">Quantity</label>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td><?= $product['descr']; ?></td>
                                <td><input class="btn btn-sm btn-outline-secondary" type="submit" value="Add to Cart" name='submit'></td>
                            </tr>
                        </table>
                    </td>
                    </tr>
                    
                </table>
                </form>
            <?php endforeach ?>    
        
    </div>
  </div>
</div>
<?= $this->endsection() ?>
