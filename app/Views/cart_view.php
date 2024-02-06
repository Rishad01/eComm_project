<?php $validation= \Config\Services::validation()?>
<?= $this->extend('layout/main') ?>
<?= $this->section('style') ?>
<?= $this->include('partials/input_style') ?>

        .product {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
        }
        .product img {
            max-width: 100px;
            max-height: 100px;
        }
        
<?= $this->endsection() ?>
<?= $this->section('content') ?>
<?= $this->include('partials/user_dashboard') ?>
<div class="container text-center">
  <div class="row justify-content-center">
  <div class="col ">

    <!---<script>
   
       // var myData = localStorage.getItem("cart");
        var myData ='test';
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the data
        console.log(myData);
        //xhr.send(myData);

        xhr.onreadystatechange = function() {       
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText); // Handle the response from the server
            }
            
        };
    </script>--->
    <table class="table">
                <tbody id="userTable">
                    <!-- Product rows will be dynamically added here -->
                </tbody>
            </table>
    <button id="checkoutButton" class="btn btn-dark mt-4">Checkout</button>

    <!--<div id="test"></div>-->
    <!-- Your HTML content -->
    
    <script>
        // JavaScript code for making an AJAX request
        //var myData = localStorage.getItem("cart");
       //console.log(myData);
       /*var xhr = new XMLHttpRequest();
        xhr.open("POST", "<?= base_url('homepage/receiveData')?>", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        // Send the data
        xhr.send("data=" + encodeURIComponent(myData));

        xhr.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {

        var responseCartView = this.responseText.replace(/\\/g, "");
        

       //console.log(this.responseText); // Handle the response from the server
       document.getElementById('test').innerHTML = responseCartView;
    }
};*/


document.addEventListener('DOMContentLoaded', function() {
    var jsonData = JSON.parse(localStorage.getItem("cart"));
    console.log(jsonData);

    function displayProducts(products) {
        var userTable = document.getElementById('userTable');

        products.forEach(function(product, index) {
            var tableRow = document.createElement('tr');

            // Create and append thumbnail directly to the table row
            var col=document.createElement('td');
            var thumbnail = document.createElement('img');
            thumbnail.src = product.pic;
            thumbnail.className = 'img-thumbnail'; // Bootstrap styling for images
            thumbnail.style.width = '150px';
            thumbnail.style.height = '150px';
            col.appendChild(thumbnail);
            tableRow.appendChild(col);

            // Create and append other cells to the table row
            var col=document.createElement('td');
            var table=document.createElement('table');
            table.style.textAlign='left';
            var nameCell = document.createElement('tr');
            nameCell.textContent = product.name;
            table.appendChild(nameCell);
            var quantityCell = document.createElement('tr');
            quantityCell.textContent = 'Quantity: ' + product.quantity;
            table.appendChild(quantityCell);
            var priceCell = document.createElement('tr');
            priceCell.textContent = 'Price: ' + product.price;
            table.appendChild(priceCell);
            col.appendChild(table);
            tableRow.appendChild(col);
            var removeButtonCell = document.createElement('td');
            var removeButton = document.createElement('button');
            removeButton.textContent = 'Remove';
            removeButton.className = 'btn btn-dark btn-sm'; // Bootstrap styling for buttons
            removeButton.addEventListener('click', function() {
                handleRemoveProduct(index);
            });
            removeButtonCell.appendChild(removeButton);
            tableRow.appendChild(removeButtonCell);

            userTable.appendChild(tableRow);
        });
    }

    function handleRemoveProduct(index) {
        // Remove the product from the jsonData array based on the index
        jsonData.splice(index, 1);

        // Update the UI by redrawing the products
        clearProductList();
        displayProducts(jsonData);

        // Update localStorage with the modified jsonData
        localStorage.setItem("cart", JSON.stringify(jsonData));
    }

    function clearProductList() {
        // Clear the existing product list
        var productList = document.getElementById('productList');
        productList.innerHTML = '';
    }

    var checkoutButton = document.getElementById('checkoutButton');
            checkoutButton.addEventListener('click', function() {
                // Call a function to handle the checkout process
                handleCheckout(jsonData);
            });

            function handleCheckout(data) {
                var jsonDataParam = encodeURIComponent(JSON.stringify(data));

            // Redirect to the checkout page with JSON data as a parameter
            var checkoutUrl = '<?= base_url("homepage/checkout_page/") ?>?jsonData=' + jsonDataParam;
            window.location.href = checkoutUrl;
            }


    displayProducts(jsonData);
});




/*function displayData(data) {
    //data = JSON.parse(data);
    var table = document.createElement('table');
    table.setAttribute('border', '1');

    // Add table header
    var header = table.insertRow(-1);
    var headers = ['ID', 'Name','Price','Quantity','Image'];
    headers.forEach(function(headerText) {
        var headerCell = document.createElement('th');
        headerCell.textContent = headerText;
        header.appendChild(headerCell);
    });

    // Add rows
    data.forEach(function(item) {
        
        var row = table.insertRow(-1);
        
        Object.values(item).forEach(function(text) {
            var cell = row.insertCell(-1);
            cell.textContent = text;
        });
    });

    // Append the table to the div
    document.getElementById('userTable').appendChild(table);
}

// Call the function with the JSON data
displayData(jsonData);*/
</script>
  </div>
  </div>
</div>
<?= $this->endsection() ?>
   


   
    
