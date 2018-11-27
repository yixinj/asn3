<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Yixin | Other</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
  <script src="main.js"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous" />
</head>

<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="index.php">CS3319 Assignment 3</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse"
      data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="customers.php">Customers <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="other.php">Other</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Connect to DB -->
  <?php include 'connect-db.php';?>

  <!--
        Insert a new purchase (prompt for necessary data). Send an error message if they try to give an invalid customer id number or invalid product number. TODO: If the user tries to let a customer purchase a product they already have purchased, instead just let them change the quantity that the customer will have purchased of that product.  Don't allow the quantity to go lower, just higher by the amount they want now.
      -->
  <div class="container">
    <h1 class="section-title">Other</h1>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Insert Purchase</h3>
        <p class="card-text">
        <?php
            // Retrieves form submission
            $customer_id =  (int)$_POST["customer_id"];
            $product_id = (int)$_POST["product_id"];
            $quantity =  (int)$_POST["quantity"];
            
            // Checks if purchase already exists
            $purchase_exists = 0;
            $query = 'SELECT * FROM purchases WHERE customer_id = '. $customer_id . ' AND product_id = ' . $product_id;
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Check if purchase exists failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                // If purchase exists, value of $purchase_exists will be > 0
                $purchase_exists += $row['customer_id'];
            }
            mysqli_free_result($result);

            // If already purchased, update value
            if($purchase_exists > 0) {
                $query = 'UPDATE purchases SET quantity = quantity + ' . $quantity . ' WHERE customer_id = '. $customer_id . ' AND product_id = ' . $product_id;
                if (!mysqli_query($connection, $query)) {
                    die("Error - update failed: " . mysqli_error($connection));
                }
                echo "Your purchase was updated!";
            }
            // Otherwise, insert into table
            else {
                $query = 'INSERT INTO purchases(customer_id, product_id, quantity) VALUES(' . $customer_id . ',' . $product_id . ',"' . $quantity . '")';
                if (!mysqli_query($connection, $query)) {
                    die("Error - insert failed: " . mysqli_error($connection));
                }
                echo "Your purchase was added!";
            }
            mysqli_close($connection);
        ?>
        </p>
        <!-- Back button :) -->
        <a href="other.php" class="btn btn-secondary">View other</a>
      </div>
    </div>
  </div>

  <footer class="footer">
    <div class="container">
      <span class="text-muted">CS3319 Assignment 3 by Yixin Jiang</span>
    </div>
  </footer>


  <!-- Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>