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
        Insert a new customer (prompt for necessary data). Auto generates the new key for the user.
    -->
  <div class="container">
    <h1 class="section-title">Customers</h1>
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Insert Customer</h3>
        <p class="card-text">
        <?php
            // Retrieves form submission
            $first_name= $_POST["first_name"];
            $last_name = $_POST["last_name"];
            $city = $_POST["city"];
            $phone_number = $_POST["phone_number"];
            $agent_id = (int)$_POST["agent_id"];  // Casts to int

            // Finds largest ID to autoindex
            $query1= 'SELECT MAX(customer_id) AS maxid FROM customers';
            $result=mysqli_query($connection,$query1);
            if (!$result) {
                die("Could not find MAX(customer_id).");
            }
            $row=mysqli_fetch_assoc($result);
            $newkey = intval($row["maxid"]) + 1;
            $customer_id = (string)$newkey;

            // Inserts into table
            $query = 'INSERT INTO customers (first_name, last_name, city,  phone_number, agent_id, customer_id) VALUES ("' . $first_name . '", "' . $last_name . '", "' . $city . '", "' . $phone_number . '", "' . $agent_id . '", "' . $customer_id . '");';
            if (!mysqli_query($connection, $query)) {
                die("Error -- insert failed: " . mysqli_error($connection));
            }
            echo 'New customer was added!';
            mysqli_close($connection);
        ?>
        </p>
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