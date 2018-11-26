<!--
    Insert a new customer. 
    Geenerates  new key for the user.
-->
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