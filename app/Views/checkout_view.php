<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
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
            <h5><?= $detail['name']; ?></h5>
          </tr>
          <tr>
            <h4>&#8377;<?= $detail['sprice']; ?>/<?= $detail['unit']; ?></h4>
          </tr>
          <tr>
          <h4>Quantity: <?=$item['qty']; ?></h4>
          </tr>
        </table>
      </td>
      <td>
        <h4>&#8377;<?= $item['qty']*$detail['sprice']; ?></h4>
        <?php $total=$item['qty']*$detail['sprice']+$total; ?>
      </td>
    </tr>
  </table>
    
<?php endforeach ?>

    <h4>Total payable amount: &#8377;<?= $total ?></h4>
    <br>
    <h4>Delivery Address</h4>
    <form action="<?= base_url('user/final_order/') ?><?= $total ?>" method="post" >
    <div class="form">
       
        <?php $address=$controller->get_addr();?>
        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value=<?= $address['addr']; ?>>
            <label class="form-check-label" for="flexRadioDefault1">
                Default
            </label>
        <input type="text" name="del_addr" class="form-control" value=<?= $address['addr']; ?> >
    </div>
    <input class="btn btn-primary" type="submit" value="place order" name='submit'>
    </form>
    
   
<?php endif ?>
  </div>
  </div>
</div>
<?= $this->endsection() ?>