<!--
    Insert a new customer. 
    Generates  new key for the user.
-->
<?php
   include 'connectdb.php';
?>
<div class="container">
    <h1>Customer Information</h1>
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
        <?php include 'list-customers.php'; ?>
        <script src="get-customer-purchases.js"></script>
    </tbody>
    </table>
</div>
<?php
    // Retrieves form submission
    $first_name= $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $city = $_POST["city"];
    $phone_number = $_POST["phone_number"];
    $agent_id = $_POST["agent_id"];

    // Finds largest ID to autoindex
    $query1= 'select max(customerid) as maxid from customers';
    $result=mysqli_query($connection,$query1);
    if (!$result) {
            die("database max query failed.");
    }
    $row=mysqli_fetch_assoc($result);
    $newkey = intval($row["maxid"]) + 1;
    $customer_id = (string)$newkey;

    // Inserts into table
    $query = 'INSERT INTO customers ("first_name", "last_name", "city", "phone_number", "agent_id", "customer_id") VALUES ("' . $first_name . '", "' . $last_name . '", "' . $city . '", "' . $phone_number . '", "' . $agent_id . '", "' . $customer_id . '");';
    if (!mysqli_query($connection, $query)) {
        die("Error: insert failed" . mysqli_error($connection));
    }
    echo "Your purchase was added!";
    mysqli_close($connection);
?>