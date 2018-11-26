<?php
// List all the products in alphabetical order by description OR in order by price. Allow the user to decide if the order is ascending or descending for both the description and price.

// Decides if it is ascending or not
// $isAsc = 0;

// if ($isAsc) {
    // Sort data ascending
    $query = "SELECT * FROM purchases ORDER BY cost_per_item ASC;";
// } else {
    // Sort data descending
    // $query = "SELECT * FROM purchases ORDER BY cost_per_item DES";
// }

$result = mysqli_query($connection, $query);
if (!$result) {
    die("databases query failed.");
}
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
