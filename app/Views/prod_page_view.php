<?= $this->extend('layout/main') ?>
<?= $this->section('script') ?>

<?= $this->endsection() ?>

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
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
    <div class="col">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach($products as $product): ?>
                
                <div class="col">
                    <div class="card shadow-sm">
                    <img class="rounded" id="<?= 'img'.$product['prod_id']?>" src="<?= $product['image']; ?>">
                        <div class="card-body">
                            <div class="container text-center">
                                <div class="row">
                                    <?php
                                    $item=[
                                        'prod_id'=>$product['prod_id'],
                                        'name'=>$product['name'],
                                        'price'=>$product['sprice'],
                                        'image'=>$product['image']
                                    ];
                                    ?>
                                    
                                    <div class="col-6">
                                        <h4 id="<?= 'n'.$product['prod_id']?>" ><?= $product['name']; ?></h4>
                                    </div>
                                    <div class="col-6">
                                        <h4 id="<?= 'p'.$product['prod_id']?>" price">&#8377;<?= $product['sprice']; ?>/<?= $product['unit']; ?></h4>
                                    </div>
                                </div>
                                <?php if(session()->has("logged_user")): ?>
                                <form action="<?= base_url('user/cart/')?><?= $product['prod_id'] ?>" method="post">
                                <div class="row">
                                    <div class="col-6">
                                    <div class="form">
                                        <input type="number" name="qty" class="form-control shadow-none" id="floatingInput" placeholder="Quantity">
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="btn-group">
                                    <input type="submit" value="Add to cart" class="btn btn-sm btn-outline-secondary">
                                    </div>
                                    </div>
                                </div>
                                </form>
                                <?php else: ?>
                                    <div class="row">
                                    <div class="col-6">
                                    <div class="form">
                                        <input value="1" type="number" name="qty" class="form-control shadow-none" id="<?= 'qty'.$product['prod_id']?>" placeholder="Quantity">
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="btn-group">
                                    <input type="submit" value="Add to cart" class="btn btn-sm btn-outline-secondary" onclick="add(<?= $product['prod_id']?>)">
                                    </div>
                                    </div>
                                </div>
                                <?php endif ?>
                            </div>
                        </div>
                        </div>
                    </div>
            <?php endforeach ?> 
    </div>   
        
    </div>
  </div>
</div>
<script>
    var product=[];
    function add(prod_id)
    {

        var name=document.getElementById('n'+prod_id).innerText;
        var price=document.getElementById('p'+prod_id).innerText;
        var qty=document.getElementById('qty'+prod_id).value;
        var image=document.getElementById('img'+prod_id).getAttribute('src');

        var arr = {
            id: prod_id,
            name: name,
            price: price,
            quantity: qty,
            pic: image
        };
        //console.log(arr);
        product.push(arr);
        localStorage.setItem("cart",JSON.stringify(product));
        //console.log(localStorage.getItem("cart"));
    }
</script>
<?= $this->endsection() ?>
