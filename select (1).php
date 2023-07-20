
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($_GET["run"] == "true") {
    $sql = "SELECT * FROM user";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    ?>
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>email</th>
            <th>PhNo</th>
            <th>Address</th>
            <th>Balance</th>
            <th>select sender</th>
        </thead>
<?php

        // output data of each row
        while($row = $result->fetch_assoc()) 
        {
        echo '
        <tr>
            <td>'.$row["ID"].'</td>
            <td>'.$row["Name"].'</td>
            <td>'.$row["email"].'</td>
            <td>'.$row["PhNo"].'</td>
            <td>'.$row["Address"].'</td>
            <td>'.$row["Balance"].'</td> 
            <td><a href="transact.php?sender='.$row['ID'].'"
            <button type="button" class="btn mybtn btn-outline-light">Send Money</button>
            </a></td>
        </tr>';


        }
?>
        </table>
<?php
    }
}
$conn->close();
?>
<!-- <style>
    table{
        box-shadow: 2px 2px 10px black;
    }
 </style> -->
 <!-- <table style="box-shadow: 2px 2px 10px black;"></table>
</style> -->
 
