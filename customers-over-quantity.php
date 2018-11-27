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
        <li class="nav-item">
          <a class="nav-link" href="customers.php">Customers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="products.php">Products</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="other.php">Other <span class="sr-only">(current)</span></a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Connect to DB -->
  <?php include 'connect-db.php';?>

  <div class="container">
    <h1 class="section-title">Other</h1>
    <!--
      TODO: List all the customer names who bought more than a given quantity of any product. Prompt the user for the quantity. Display the description of the product and quantity purchased also.
    -->
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Customers Over Quantity</h3>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Product description</th>
                <th scope="col">Quantity</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $quantity = (int)$_POST['quantity'];
                $query = 'SELECT customer.first_name AS first_name, customer.last_name AS last_name, product.product_description AS product_description, purchases.quantity AS quantity FROM purchases, customers, products WHERE AND purchases.quantity > '. $quantity;
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Querying for customers who bought more than a certain quantity failed.");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <tr>
                        <th scope="row">' . $row['first_name'] . '</th>
                        <td>' . $row['last_name'] . '</td>
                        <td>' . $row['product_description'] . '</td>
                        <td>' . $row['quantity'] . '</td>
                        </tr>
                        ';
                }
                mysqli_free_result($result);
                mysqli_close($connection);
                ?>
            </tbody>
            </table>
        </div>
        <!-- Back button :) -->
        <a href="other.php" class="btn btn-secondary">View other</a>
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