<!---If not logged in--->
<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-6 ">
  <script src="path/to/jquery-3.6.4.min.js"></script>
  <script>
      var jData = <?= $items ?>;
      alert();

      var seperator = ',';
      $('#json').html(jData);
      $('#btnConvert').load(function() {
        ConvertToTable(jData);
      });

      function ConvertToTable(jData) {
        var arrJSON = typeof jData != 'object' ? JSON.parse(jData) : jData;
        var $table = $('<table/>');
        var $headerTr = $('<tr/>');
        
        for (var index in arrJSON[0]) {
          $headerTr.append($('<th/>').html(index));
        }
        $table.append($headerTr);
        for (var i = 0; i < arrJSON.length; i++) {
        var $tableTr = $('<tr/>');
          for (var index in arrJSON[i]) {
            $tableTr.append($('<td/>').html(arrJSON[i][index]));
          }
          $table.append($tableTr);
        }
        $('body').append($table);
      }

    </script>
     
  </div>
</div>
</div>

<?= $this->endsection() ?>
