<!--
      Insert a new purchase (prompt for necessary data) Note: Send an error message if they try to give an invalid customer id number or invalid product number (or make your GUI so that it doesnt allow them to pick those). If the user tries to let a customer purchase a product they already have purchased, instead just let them change the quantity that the customer will have purchased of that product.  Don't allow the quantity to go lower, just higher by the amount they want now.
    -->
<!-- TODO: conditionals -->
<?php
// Results from post (clicking submit)
   $customer_id =  $_POST["customer_id"];
   $product_id = $_POST["product_id"];
   $quantity =$_POST["quantity"];
   
   $query = 'INSERT INTO purchases values("' . $customer_id . '","' . $product_id . '","' . $quantity . '")';
   if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
   echo "Your purchase was added!";
   mysqli_close($connection);
?>