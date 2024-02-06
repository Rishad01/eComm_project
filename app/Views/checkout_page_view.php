<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('script') ?>
<script>
function text(x){
  if(x==0)
  {
    document.getElementById("old_addr").style.display="block";
    document.getElementById("new_addr").style.display="none";
  }
  else{
    document.getElementById("new_addr").style.display="block";
    document.getElementById("old_addr").style.display="none";
  }
  return;
}
</script>
<?= $this->endsection() ?>
<?= $this->section('style') ?>
body{
            background-color: #FBF6EE;
        }

input:hover{
    transform:scale(1.05);
    transition: 1.05s;
}
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-6 ">
  <?php if($items): ?>

<?php foreach($items as $item): ?>
  <?php $detail=$controller->myOtherFunct($item['id']); ?>
  <table class="table">
    <tr>
      <td>
        <img width="100px" height="100px" src="<?= $detail['image']; ?>" alt="product image">
      </td>
      <td>
        <table class="table">
          <tr>
            <h4><?= $detail['name']; ?></h4>
          </tr>
          <tr>
            <h5>&#8377;<?= $detail['sprice']; ?>/<?= $detail['unit']; ?></h5>
          </tr>
          <tr>
          <h5>Quantity: <?=$item['quantity']; ?></h5>
          </tr>
        </table>
      </td>
      <td>
        <h5>&#8377;<?= $item['quantity']*$detail['sprice']; ?></h5>
        <?php $total=$item['quantity']*$detail['sprice']; ?>
      </td>
    </tr>
  </table>
    
<?php endforeach ?>

<div class="container">
<div class="row gy-2">
  <div class="col-12">
    <h4>Total amount:&#8377;<?= $total ?></h4>
    <?php $tax=0.18*$total; ?>
    <h4>GST : &#8377;<?= $tax ?>
    <hr>
    <h4>Total payable amount: &#8377;<?= $total+$tax; ?></h4>
    <?php $total=$total+$tax; ?>
  </div>
  <div class="col-12">
    
    </div>
    <?php $arr=[
        'total'=>$total,
        'cart_items'=>$items
    ]; 
    
    ?>
    
    <?php if(session()->has("logged_user")): ?>
    <form action="<?= base_url('homepage/final_order') ?>" method="post" >
    <div class="form">
    <div class="container">
    <div class="row gy-2">
        <?php $address=$controller->get_addr();?>
        <input type="hidden" name="data" value="<?= htmlspecialchars(http_build_query($arr)) ?>">
        <div class="col-12">
          <input class="form-check-input" type="radio" name="del_addr" id="flexRadioDefault1" value="<?= $address['addr'];?>" onclick="text(0)" >
          <label class="form-check-label" for="flexRadioDefault1">Default</label>
        </div>

        <div class="col-12">
        <div id="old_addr" style="display: none;"><?= $address['addr'];?></div>
        </div>

        <div class="col-12">
          <input class="form-check-input" type="radio" name="del_addr" id="flexRadioDefault1" onclick="text(1)">
          <label class="form-check-label" for="flexRadioDefault1">New Address</label>
        </div>

        <div class="col-12">
        <textarea  id="new_addr" type="text" name="del_addr" class="form-control" style="display: none" ></textarea>
        </div>

        <div class="col-3 align-self-center">
        <input class="btn btn-dark" type="submit" value="place order" name='submit'>
        </div>
        </div>
        </div>
        </div>
        </form>
        <?php else: ?>
            <form action="<?= base_url('homepage/final_order') ?>" method="post" >
            <div class="form">
            <input type="hidden" name="data" value="<?= htmlspecialchars(http_build_query($arr)) ?>">

                <div class="row gy-2 justify-content-center">
                    <div class="col-12">
                    <h1 class="h3 mb-3 fw-normal">Please login</h1>
                    </div>
                    
                    <div class="col-12">
                    <div class="form-floating">
                        <input type="email" class="form-control shadow-none" id="floatingInput" placeholder="name@example.com" name="email" value="<?= set_value('email')?>">
                        <label for="floatingInput">Email</label>
                        <span class="text-danger"><?= $validation->getError('email'); ?></span>
                    </div>
                    </div>
                    
                    <div class="col-12">
                    <div class="form-floating">
                        <input type="password" class="form-control shadow-none" id="floatingPassword" placeholder="Password" name="pass">
                        <label for="floatingPassword">Password</label>
                        <span class="text-danger"><?= $validation->getError('pass'); ?></span>
                    </div>
                    </div>

                    <div class="col-8 align-self-center">
                    <button class="btn btn-dark py-2" type="submit">Login and Place order</button>
                    </div>
                </div>
                <div class="col-12">
                    <a href="<?= base_url('homepage/signup') ?>">Click here if you are not Registered</a>
                </div>
                
            </div>
            
        </form>
        <?php endif ?>
      </div>
      </div>
    
   
<?php endif ?>
  </div>
  </div>
</div>
<?= $this->endsection() ?>