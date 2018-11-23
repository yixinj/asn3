<?php
// When a user selects a customer, display all of his/her products that he/she has purchased
$query = "SELECT * FROM purchases WHERE customer_id = " . $customer_id . ";";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
    var_dump($row);
    echo $row;
}
mysqli_free_result($result);
