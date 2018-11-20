<?php
$query = "SELECT * FROM customers";
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
        </tr>
        ';
}
mysqli_free_result($result);
