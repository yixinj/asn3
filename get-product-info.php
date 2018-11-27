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
      List the total number of purchases for a particular product and the product description and the total money made in sales for that product (cost * quantity). Prompt the user for the product id. Display an error message if the the product does not exist
    -->
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">
            <?php
            $product_id = (int)$_POST['product_id'];
            echo 'Product Info for Product with ID ' . $product_id;
            ?>
            </h3>
            <table class="table">
            <thead>
                <tr>
                <th scope="col">Product description</th>
                <th scope="col">Total purchases</th>
                <th scope="col">Money made</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $query = 'SELECT SUM(purchases.quantity) AS total_purchases, products.product_description AS product_description, (products.cost_per_item * SUM(purchases.quantity)) AS money_made FROM products, purchases WHERE products.product_id = ' . $product_id . ' AND products.product_id = purchases.product_id GROUP BY purchases.product_id';
                $result = mysqli_query($connection, $query);
                if (!$result) {
                    die("Product with given ID does not exist.");
                }
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '
                        <tr>
                        <th scope="row">' . $row['product_description'] . '</th>
                        <td>' . $row['total_purchases'] . '</td>
                        <td>' . $row['money_made'] . '</td>
                        </tr>
                        ';
                }
                mysqli_free_result($result);
                mysqli_close($connection);
                ?>
            </tbody>
            </table>
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