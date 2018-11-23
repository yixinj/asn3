<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Yixin | CS3319 Asn3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#">CS3319 Assignment 3</a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"
              >Home <span class="sr-only">(current)</span></a
            >
          </li>
        </ul>
      </div>
    </nav>

    <!-- Connect to DB -->
    <?php
include 'connect-db.php';
?>

    <div class="container">
      <h1>Customer Information</h1>
    <!-- List all the information about all the customers in alphabetical order by last name. When a user selects a customer, display all of his/her products that he/she has purchased. -->
      <table class="table">
        <thead>
          <tr>
            <th scope="col">customer_id</th>
            <th scope="col">first_name</th>
            <th scope="col">last_name</th>
            <th scope="col">city</th>
            <th scope="col">phone_number</th>
            <th scope="col">agent_id</th>
          </tr>
        </thead>
        <tbody>
          <?php
include 'list-customers.php';
?>
<script src="get-customer-purchases.js"></script>
        </tbody>
      </table>
    </div>

    <!-- List all the products in alphabetical order by description OR in order by price. Allow the user to decide if the order is ascending or descending for both the description and price.  -->
    <div class="container">
      <h1>Product Information</h1>
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
          
        </tbody>
      </table>
      <button type="button" class="btn btn-primary">Ascending price</button>
      <button type="button" class="btn btn-primary">Descending price</button>
    </div>

<!-- $query = "SELECT * FROM products ORDER BY product_description";
 -->
<!-- $query = "SELECT * FROM products ORDER BY cost_per_item";
 -->
 <!-- Kinda confusing but I'm assuming you pick one and choose ORDER BY DESCENDING/ASCENDING? -->

    <!-- Insert a new purchase (prompt for necessary data) Note: Send an error message if they try to give an invalid customer id number or invalid product number (or make your GUI so that it doesnt allow them to pick those). If the user tries to let a customer purchase a product they already have purchased, instead just let them change the quantity that the customer will have purchased of that product.  Don't allow the quantity to go lower, just higher by the amount they want now.  -->

    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="exampleSelect1">Example select</label>
        <select class="form-control" id="exampleSelect1">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleSelect2">Example multiple select</label>
        <select multiple class="form-control" id="exampleSelect2">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleTextarea">Example textarea</label>
        <textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputFile">File input</label>
        <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
        <small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
      </div>
      <fieldset class="form-group">
        <legend>Radio buttons</legend>
        <div class="form-check">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="option1" checked>
            Option one is this and that&mdash;be sure to include why it's great
          </label>
        </div>
        <div class="form-check">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2">
            Option two can be something else and selecting it will deselect option one
          </label>
        </div>
        <div class="form-check disabled">
        <label class="form-check-label">
            <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios3" value="option3" disabled>
            Option three is disabled
          </label>
        </div>
      </fieldset>
      <div class="form-check">
        <label class="form-check-label">
          <input type="checkbox" class="form-check-input">
          Check me out
        </label>
      </div>
      <button type="submit" class="btn btn-primary">Submit</button>
    </form>

<!-- $query = "INSERT INTO purchases (customer_id, product_id, quantity) VALUES ()";
 -->
 <!-- If a previous purchase of the same item has been detected -->
 <!-- $query = "UPDATE purchases SET quantity = <> WHERE product_id = <> and customer_id = <>;" -->


    <!-- Insert a new customer (prompt for necessary data) Note: Send an error message if they try to insert an existing customer id number (or make your GUI so that it generated the new key for the user) -->

<!-- $query = "INSERT INTO customers (first_name, last_name, city, phone_number, customer_id, agent_id) VALUES (<> <> <> <> <>)";
 -->


    <!-- Update a customer's phone number, prompt for the customer id number, display the current phone number before prompting them for the new phone number. Note: Send an error message if the user doesn't enter an existing customer id (or use your GUI to only allow them to pick from a list of current customers) -->

<!-- $query = "UPDATE customers SET first_name = <>, last_name = <>, city = <>, phone_number = <>, agent_id = <> WHERE customer_id = <>";
 -->


    <!-- Delete a customer (Prompt for the customer id to delete) Note: Send a warning message if they try to delete a non existing customer id number (or make your GUI so that they can only pick an existing customer from a list) -->

<!-- $query = "DELETE FROM customers WHERE customer_id = <>";
 -->


    <!-- List all the customer names who bought more than a given quantity of any product. Prompt the user for the quantity. Display the description of the product and quantity purchased also. -->

<!-- $query = "SELECT customer.first_name, customer.last_name, products.product_description, purchases.quantity FROM customers, products, purchases WHERE customer.customer_id = purchases.customer_id AND product.product_id = purchases.product_id AND quantity > <quantity>";
 -->


    <!-- List the description of any product that has never been purchased -->

<!-- $query = "SELECT product_description FROM products WHERE product_id NOT IN (SELECT DISTINCT product_id FROM purchases)";
 -->


    <!-- List the total number of purchases for a particular product and the product description and the total money made in sales for that product (cost * quantity)Prompt the user for the product id (Note: display an error message if the the product does not exist - or create the GUI in a way that the user cant pick a product that doesnt exist) -->

<!-- $query = "SELECT ";
 -->


    <!-- Bonus (worth 2%): add an extra field to the customer's table called cusimage (you can do this right in mysql, not using php code, make it char(100)). Allow the user to click on one of the customers and if this field is null then let the user find an image online and add the url to the officials table AND display the image in your user interface. If the field is not null, display the image at the url..  -->
    <!-- ALTER TABLE customers ADD cus_image char(100); -->

    <!-- Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
