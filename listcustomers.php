<?php
// List all the information about all the customers in alphabetical order by last name
$query = "SELECT * FROM customers ORDER BY last_name";
$result = mysqli_query($connection, $query);
if (!$result) {
    die("databases query failed.");
}
while ($row = mysqli_fetch_assoc($result)) {
    echo '
        <tr>
          <th scope="row"><a id=' . $row['customer_id'] . ' href="#">' . $row['customer_id'] . '</a></th>
          <td>' . $row['first_name'] . '</td>
          <td>' . $row['last_name'] . '</td>
          <td>' . $row['city'] . '</td>
          <td>' . $row['phone_number'] . '</td>
          <td>' . $row['agent_id'] . '</td>
        </tr>
        ';
}
mysqli_free_result($result);
