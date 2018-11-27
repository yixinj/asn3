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
    <!-- Insert purchase -->
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Insert Purchase</h3>
        <form action="insert-purchase.php" method="post">
          <div class="form-group">
            <label for="">customer_id</label>
            <input
              type="text"
              class="form-control"
              name="customer_id"
            />
          </div>
          <div class="form-group">
            <label for="">product_id</label>
            <input
              type="text"
              class="form-control"
              name="product_id"
            />
          </div>
          <div class="form-group">
            <label for="">quantity</label>
            <input
              type="text"
              class="form-control"
              name="quantity"
            />
          </div>
          <button type="submit" class="btn btn-primary">Insert Purchase</button>
        </form>
      </div>
    </div>
    <!--
      TODO: List all the customer names who bought more than a given quantity of any product. Prompt the user for the quantity. Display the description of the product and quantity purchased also.
    -->
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Customers Over Quantity</h3>
        <form action="/customers-over-quantity.php" method="post">
          <div class="form-group">
            <label for="">Quantity</label>
            <input
              type="text"
              class="form-control"
              name="quantity"
            />
          </div>
          <button type="submit" class="btn btn-primary">Query</button>
        </form>
      </div>
    </div>
    <!--
      TODO: List the total number of purchases for a particular product and the product description and the total money made in sales for that product (cost * quantity)Prompt the user for the product id (Note: display an error message if the the product does not exist - or create the GUI in a way that the user cant pick a product that doesnt exist)
    -->
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Product Sales Info</h3>
        <form action="get-product-info.php" method="post">
          <div class="form-group">
            <label for="">Product ID</label>
            <input
              type="text"
              class="form-control"
              name="product_id"
            />
          </div>
          <button type="submit" class="btn btn-primary">Query</button>
        </form>
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