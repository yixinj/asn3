<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <title>Yixin | Products</title>
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
        <li class="nav-item active">
          <a class="nav-link" href="products.php">Products <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="other.php">Other</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Connect to DB -->
  <?php include 'connect-db.php';?>
  
  <!-- List all the products in alphabetical order by description OR in order by price. Allow the user to decide if the order is ascending or descending for both the description and price. -->
  <div class="container">
    <h1 class="section-title">Products</h1>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Product List</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product description</th>
              <th scope="col">Cost per item</th>
              <th scope="col">Items on hand</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $query = "SELECT * FROM products ORDER BY ";

            // Decides if it will be asc or desc price or description. Default = desc price
            if ($_GET['sort'] == 'asc_price')
            {
                $query .= "cost_per_item ASC";
            }
            elseif ($_GET['sort'] == 'asc_description')
            {
                $query .= "product_description ASC";
            }
            elseif ($_GET['sort'] == 'desc_description')
            {
                $query .= "product_description DESC";
            }
            else
            {
                $query .= "cost_per_item DESC";
            }

            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("databases query failed.");
            }
            // Creates table
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
            // Frees result but does not disconnect
            mysqli_free_result($result);
            ?>
          </tbody>
        </table>

        <!-- Buttons to decide how to sort table -->
        <a class="btn btn-primary" href="products.php?sort=asc_price" role="button">Ascending price</a>
        <a class="btn btn-primary" href="products.php?sort=desc_price" role="button">Descending price</a>
        <a class="btn btn-primary" href="products.php?sort=asc_description" role="button">Ascending description</a>
        <a class="btn btn-primary" href="products.php?sort=desc_description" role="button">Descending description</a>
      </div>
    </div>

    <!-- List the description of any product that has never been purchased -->
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Unpurchased Products</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Product ID</th>
              <th scope="col">Product description</th>
              <th scope="col">Cost per item</th>
              <th scope="col">Items on hand</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // Find products that have never been purchased
            $query = "SELECT * FROM products WHERE product_id NOT IN (SELECT product_id FROM purchases)";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Querying from products/purchases failed.");
            }
            // Creates table
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
            mysqli_close($connection);
            ?>
          </tbody>
        </table>
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