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
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-6 ">
  <?php if($items): ?>

<?php foreach($items as $item): ?>
  <?php $detail=$controller->myOtherFunct($item['prod_id']); ?>
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
          <h5>Quantity: <?=$item['qty']; ?></h5>
          </tr>
        </table>
      </td>
      <td>
        <h5>&#8377;<?= $item['qty']*$detail['sprice']; ?></h5>
        <?php $total=$item['qty']*$detail['sprice']+$total; ?>
      </td>
    </tr>
  </table>
    
<?php endforeach ?>

<div class="container">
<div class="row gy-2">
  <div class="col-12">
    <h4>Total payable amount: &#8377;<?= $total ?></h4>
  </div>
  <div class="col-12">
    <h4>Delivery Address</h4>
    </div>
    <form action="<?= base_url('user/final_order/') ?><?= $total ?>" method="post" >
    <div class="form">
    <div class="container">
    <div class="row gy-2">
        <?php $address=$controller->get_addr();?>
        <div class="col-12">
          <input class="form-check-input" type="radio" name="del_addr" id="flexRadioDefault1" value=<?= $address['addr'];?> onclick="text(0)" >
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
        <textarea  id="new_addr" type="text" name="del_addr" class="form-control" style="display: none" value=<?= $address['addr']; ?> ></textarea>
        </div>

        <div class="col-3 align-self-center">
        <input class="btn btn-dark" type="submit" value="place order" name='submit'>
        </div>
        </div>
        </div>
        </div>
        </form>
      </div>
      </div>
    
   
<?php endif ?>
  </div>
  </div>
</div>
<?= $this->endsection() ?>