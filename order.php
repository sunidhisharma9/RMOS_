<?php
session_start();
include 'connection.php';

$query = "select * from menu";
$result = mysqli_query($conn, $query);

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Order</title>
  <script src="https://kit.fontawesome.com/94094e8e6a.js"></script>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/css?family=Lobster|Montserrat&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="css/order.css">
</head>


<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-light upper">
  <a class="navbar-brand" href="firstpage.php">RMOS</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link " href="menu.php">MENU <span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="order.php">ONLINE ORDER</a>
      <a class="nav-item nav-link" href="reservation.php">RESERVATION</a>
      <a class="nav-item nav-link" href="about_us.php" >ABOUT US</a>
      <!-- <a class="nav-item nav-link" href="#" ><?php echo $_SESSION['username'];?></a> -->
      <div class="dropdown d">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <?php echo $_SESSION['username'];?>
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
        <button class="dropdown-item" type="button"><a href="profilesettings.php">UPDATE DETAILS</a></button>
        <button class="dropdown-item" type="button"><a href="booking.php">BOOKING HISTORY</a></button>
        <button class="dropdown-item" type="button"><a href="order_history.php">ORDER HISTORY</a></button>
        <button class="dropdown-item" type="button"><a href="logout.php">LOG OUT</a></button>
        <!-- <button class="dropdown-item" type="button">Something else here</button> -->
      </div>
    </div>
    </div>
  </div>
</nav>



  <!-- menu -->
    <div class="row main menu">

      <div class="row items col-8">

        <?php if (mysqli_num_rows($result) > 0) {
          while ($food = $result->fetch_assoc()) { ?>
            <div class="food col-6">

              <div class="text">
                <h6 class="food-item-name"><?= $food['item_name'] ?></h6>
                <p class="food-item-price"><span><?= $food['item_price'] ?></span></p>
              </div>

              <div class="field1">
                <input type="text" class="food_name" value="<?= $food['item_name'] ?>" hidden>
                <input type="text" class="food_price" value="<?= $food['item_price'] ?>" hidden>
                <button type="button" class="btn btn-dark btn-sm sub" id="sub" >-</button>
                <input type="number" id="1" value="0" min="1" max="5" />
                <button type="button" id="add" class="add btn btn-dark btn-sm">+</button>
              </div>

            </div>
        <?php }
        } ?>
      </div>


      <!-- cart -->

      <div class="cart col-4 py-4 px-5">
        <br><br>
        <h5 class="align-items-center">Cart</h5>

        <ul class="cart-items d-flex flex-column list-unstyled"></ul>

        <br>
        <div class="total d-flex justify-content-between ">
          <h6>TOTAL</h6>
          <p>Rs <span class="amount">0</span></p>
        </div>

        <br>
        <div class="total d-flex justify-content-between ">
        <button type="button" name="total" id="total" class="total btn btn-dark btn-sm" onclick="totalbill()">TOTAL BILL + TAX</button>
        <p><span id="bill"></span></p>
        </div>

        <br>
        <div>
          <input type="hidden" name="food_items" id="foodItems" value="" />
          <button type="button" class="btn btn-dark btn-sm" name="insert" onclick="insertData(<?php echo $_SESSION['id']?>)">PAY</button>
        </div>

    </div>


<!-- footer -->
    <div class="footer">
      <a style="color:white" class="mr-5" href="contact_us.php">CONTACT US</a>
      <a style="color:white" class="ml-5" href="feedback.php">FEEDBACK</a>
      <p class="copy">© Copyright 2019 RMOS</p>
    </div>


<!-- functions -->
    <script>

      function insertData(id)
      {
        totalbill();
        var foodItems=document.getElementById('foodItems').value;
        var bill=document.getElementById('bill').innerText;
        window.location="payment_temp.php?id="+id+"&items="+foodItems+"&bill="+bill;
      }

      function createItemInCart(name, price, quantity) {
        var listitem = document.createElement('li');
        listitem.classList.add('item','d-flex', 'w-10', 'justify-content-between', 'px-1', 'py-2', 'bg-muted', 'align-items-center');
        var h6 = document.createElement('h6');
        h6.appendChild(document.createTextNode(name));
        h6.classList.add('mb-0', 'food-name');
        var p2 = document.createElement('p');
        p2.appendChild(document.createTextNode(quantity));
        p2.classList.add('item-quantity','mb-0');
        var p1 = document.createElement('p');
        p1.appendChild(document.createTextNode(price));
        p1.classList.add('item-price','mb-0');
        listitem.appendChild(h6);
        listitem.appendChild(p2);
        listitem.appendChild(p1);

        var cart_items = document.querySelector('.cart-items');
        cart_items.appendChild(listitem);
      }

      function updateItemInCart(name, quantity, price){
        var itemlist = document.querySelectorAll('.item');
        var target = searchElement(itemlist, name);

        target.firstChild.nextSibling.innerHTML = quantity;
        target.firstChild.nextSibling.nextSibling.innerHTML = parseInt(price) * parseInt(quantity);
      }

	  function calculateTotal(){
		  var listitem = document.querySelectorAll('.item');
		  var total = 0;
		  for(var i = 0;i < listitem.length;i++){
			total += parseInt(listitem[i].firstChild.nextSibling.nextSibling.innerHTML);
		  }
		  var amount = document.querySelector('.amount');
      amount.innerHTML = total;
	  }

    function calculateTotalitems()
    {
       var listitem = document.querySelectorAll('.item');
       var food_items = "";
       for(var i = 0;i < listitem.length-1;i++)
       {
          food_items=listitem[i].firstChild.innerHTML+"," + food_items;
        }

        food_items+=listitem[i].firstChild.innerHTML;

        document.getElementById('foodItems').value=food_items;
     //alert(food_items);
   }

      function searchElement(itemlist, name){
        for(var i = 0; i < itemlist.length; i++){
          var h3 = itemlist[i].firstChild;
          if(h3.innerHTML == name){
            target = itemlist[i];
            break;
          }
        }
        return target;
      }

      function deleteItemInCart(name){
        var itemlist = document.querySelectorAll('.item');
        var target = searchElement(itemlist, name);
        target.parentElement.removeChild(target);
      }

// add + in cart
      $('.add').click(function() {
        if($(this).prev().val() == 0){
          $(this).prev().val(+$(this).prev().val() + 1);
          var name = $(this).closest('.field1').children('.food_name').val();
          var price = $(this).closest('.field1').children('.food_price').val();
          createItemInCart(name, price, $(this).prev().val());
        }
        else if ($(this).prev().val() > 0 && $(this).prev().val() < 5) {
          $(this).prev().val(+$(this).prev().val() + 1);
          var name = $(this).closest('.field1').children('.food_name').val();
          var price = $(this).closest('.field1').children('.food_price').val();
          updateItemInCart(name, $(this).prev().val(), price);
        }
        calculateTotal();
      });
// sub - in cart
      $('.sub').click(function()
      {
        if($(this).next().val() == 1)
        {
          $(this).next().val(+$(this).next().val() - 1);
          var name = $(this).closest('.field1').children('.food_name').val();
          deleteItemInCart(name);
       }
        else if ($(this).next().val() > 1 && $(this).next().val() <= 5)
         {
          $(this).next().val(+$(this).next().val() - 1);
          var name = $(this).closest('.field1').children('.food_name').val();
          var price = $(this).closest('.field1').children('.food_price').val();
          updateItemInCart(name, $(this).next().val(), price);
        }
        calculateTotal();
      });

//calculates the total bill + 18% tax;
        function totalbill() {
          var listitem = document.querySelectorAll('.item');
         var total = 0;
         for(var i = 0;i < listitem.length;i++){
         total += parseInt(listitem[i].firstChild.nextSibling.nextSibling.innerHTML);
         }
         document.getElementById('bill').innerHTML=total+total*0.18;
          calculateTotalitems();
        }
    </script>
</body>
