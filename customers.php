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


  <div class="container">
    <h1 class="section-title">Customers</h1>
    <!--
      List all the information about all the customers in alphabetical order by last name. When a user selects a customer, display all of his/her products that he/she has purchased.
    -->
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Customer List</h3>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">Customer ID</th>
              <th scope="col">First name</th>
              <th scope="col">Last name</th>
              <th scope="col">City</th>
              <th scope="col">Phone number</th>
              <th scope="col">Agent ID</th>
              <th scope="col">Actions</th>
              <th scope="col">Image</th>
            </tr>
          </thead>
          <tbody>
            <?php
            // List all the information about all the customers in alphabetical order by last name
            $query = "SELECT * FROM customers ORDER BY last_name;";
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("databases query failed.");
            }
            while ($row = mysqli_fetch_assoc($result)) {
                echo '
                    <tr>
                      <th scope="row">' . $row['customer_id'] . '</th>
                      <td>' . $row['first_name'] . '</td>
                      <td>' . $row['last_name'] . '</td>
                      <td>' . $row['city'] . '</td>
                      <td>' . $row['phone_number'] . '</td>
                      <td>' . $row['agent_id'] . '</td>
                      <td>
                      <a href="get-customer-purchases.php?customer_id=' . $row['customer_id'] . '">Purchases</a><br>
                      <a href="edit-phone-number.php?customer_id=' . $row['customer_id'] . '">Edit number</a><br>
                      <a style="color:red" href="delete-customer.php?customer_id=' . $row['customer_id'] . '">Delete</>
                      </td>
                      <td>' . $row['cus_image'] . '</td>
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
    <!--
      Insert a new customer (prompt for necessary data). Auto generates the new key for the user
    -->
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Insert Customer</h4>
        <form action="insert-customer.php" method="post">
          <div class="form-group">
            <label>First Name</label>
            <input
              type="text"
              class="form-control"
              name="first_name"
            />
          </div>
          <div class="form-group">
            <label>Last Name</label>
            <input
              type="text"
              class="form-control"
              name="last_name"
            />
          </div>
          <div class="form-group">
            <label>City</label>
            <input
              type="text"
              class="form-control"
              name="city"
            />
          </div>
          <div class="form-group">
            <label>Phone Number</label>
            <input
              type="text"
              class="form-control"
              name="phone_number"
            />
          </div>
          <div class="form-group">
            <label>Agent ID</label>
            <input
              type="text"
              class="form-control"
              name="agent_id"
            />
          </div>
          <button type="submit" class="btn btn-primary">Insert customer</button>
        </form>
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