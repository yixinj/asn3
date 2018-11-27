<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Yixin | Customers</title>
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
    <a class="navbar-brand" href="#">CS3319 Assignment 3</a>
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

  <!-- When a user selects a customer, display all of his/her products that he/she has purchased. -->
  <div class="container">
    <!-- Echos the customer ID -->
    <?php
    echo '<h1 class="section-title">Customer '. $_GET['customer_id'] . '</h1>'
    ?>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Purchased Products</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">product_id</th>
              <th scope="col">product_description</th>
              <th scope="col">cost_per_item</th>
              <th scope="col">items_on_hand</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Select all product information from a customer's purchases based on customer ID
            $query = "SELECT * FROM products WHERE product_id IN (SELECT purchases.product_id FROM purchases, customers WHERE purchases.customer_id = customers.customer_id AND ";
            $query .= "customers.customer_id = " . $_GET['customer_id'] . ")";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("databases query failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <tr>
                      <th scope="row">' . $row['product_id'] . '</th>
                      <td>' . $row['product_description'] . '</td>
                      <td>' . $row['cost_per_item'] . '</td>
                      <td>' . $row['items_on_hand'] . '</td>
                    </tr>
                    ';
            }
            mysqli_free_result($result);
            ?>
          </tbody>
        </table>
        
        <!-- Back button :) -->
        <a href="customers.php" class="btn btn-secondary">View customers</a>
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