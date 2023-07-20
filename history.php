<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$amount = $_POST["number"];
$receiver = $_POST["receiver"];
$sender = $_POST["sender"];

$a = "SELECT Balance FROM user WHERE ID=".$sender;
$senderBalance = $conn->query($a);
$row = $senderBalance->fetch_assoc();
$senderBalance = $row['Balance'];
$updatedSenderBalance  = $senderBalance - $amount;

$b = "UPDATE `user` SET `Balance` =".$updatedSenderBalance." "."WHERE `ID`=".$sender;
$conn->query($b);

$c = "SELECT Balance FROM user WHERE ID=".$receiver;
$receiverBalance = $conn->query($c);
$row = $receiverBalance->fetch_assoc();
$receiverBalance = $row['Balance'];
$updatedReceiverBalance  = $receiverBalance + $amount;

$d = "UPDATE `user` SET `Balance` =".$updatedReceiverBalance." "."WHERE `ID`=".$receiver;
$conn->query($d);

$ab = "SELECT Name FROM user WHERE ID=".$receiver;
$receiverName = $conn->query($ab);
$row = $receiverName->fetch_assoc();
$receiverName = $row['Name'];


$ab = "SELECT Name FROM user WHERE ID=".$sender;
$senderName = $conn->query($ab);
$row = $senderName->fetch_assoc();
$senderName = $row['Name'];


$e = "INSERT INTO transaction(Sender, Reciever, balance) VALUES ('$senderName', '$receiverName', '$amount')";
$conn->query($e);




$sql = "SELECT * FROM transaction WHERE Sender='$senderName'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
?>
<h1 class="heading">TRANSACTION HISTORY</h1>
<table>
    <thead>
        <th>Sender</th>
        <th>Receiver</th>
        <th>Amount Transferred</th>
    </thead>
<?php
      while($row = $result->fetch_assoc()) 
      {
      echo '
      <tr>
          <td>'.$row["Sender"].'</td>
          <td>'.$row["Reciever"].'</td>
          <td>'.$row["Balance"].'</td>
      </tr>';
      }
?>
      </table>
      
<?php
  }
?>
<div class="send">
<button class="recieve" onclick="location.href='index.html'">
 
Home </button></div>
<html>
<style>
    table, th, td{
        box-shadow: 2px 2px 10px black;
        border-radius: 0.1px;
        font-weight: bold;
        background-color: white;
        font-family: Arial, Helvetica, sans-serif;
        border: 1px solid;
        width: 50%;
        border-collapse: collapse; 
        text-align: center; 
        height: 150px;
        
    }
    table{
        margin:auto;
    }

    th, td{
        height:70px;
        padding: 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th{
        background-color: #86af49;
    }
    .heading{
        text-align:center;
        margin-top:50px;
    }
    .send{
        text-align:center;
        margin:40px 0px;
    }

    .recieve{
    border: 2px solid #9dd1ff;
    border-radius: 10px;
    color: #348efe;
    display: inline-block;
    padding: 17px 30px;
    text-decoration: none;
    margin: 25px 0;
    transition: background-color 200ms ease-in-out;
    background-color: orange;
    color: black;
    text-align: center;
    margin: auto;
    display: flex;
    }
    .home-button:hover,.home-button:focus{
    background-color: #e1f1ff ;
    }

    .center {
        margin: auto;
        width: 57.5%;
        border: 3px solid #73AD21;
        padding: 10px;
        text-align: center;
        border: 3px solid black;
    }

    html{
    background-color: #b5e7a0;
    /* display: flex; */
    justify-content: center;
    align-items: center;
    min-height: 100vh;
    }
  </style>
  </html>