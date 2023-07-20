<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bank";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

if (isset($_GET["sender"])) {
	$sender = $_GET["sender"];
}

?>


<!DOCTYPE html>
<html>
    <head>
        <title></title>
</head>
<body>
    
    <form action = "history.php" method='post'>
    <input type="hidden" name="sender" value="<?php echo $sender; ?>">
    <div>SELECT BENEFICIARY ID:
    <select class="opt" name="receiver">
        <?php while($rows = $result->fetch_assoc()){
            ?>
            <option  value="<?php echo $rows['ID']; ?> "> <?php echo $rows['ID']; ?> </option>
        <?php
        }
        ?>
    </select></div>
    <div>
    <label for="number"> Amount to be transferred:</label>
    <input type="number" placeholder="Enter amount" id='number' name='number'>
    <button class="ok">Submit</button></div>

    </form>
    <div class="bank">
        <img src="./images/19197291.jpg" alt="">
    </div>
</body>
</html>
<style>
    .center{
        margin:auto;
        margin-top: 5%;
        width: 57.5%;
        border: 3px solid #73AD21;
        padding: 10px;
        text-align: center;
        border: 3px solid #016ff9;
        background-color: #4169e1;
        height: 500px;
        border-radius: 25px;
    }
    .opt{
        width:100px;
    }
    .ok{
        background-color:blue;
        color:white;
        border:0px solid black;
        border-radius:5px;
        padding:5px 12px;
    }

    html{
        line-height:2.5;
        letter-spacing:2px;
        font-size: larger;
        font-weight: bolder;
        font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        background-color: #b5e7a0;
    }

    .submit-button{
    border: 1.5px solid #9dd1ff;
    border-radius: 10px;
    color: #348efe;
    display: inline-block;
    padding: 17px 30px;
    text-decoration: none;
    margin: 25px 0;
    transition: background-color 200ms ease-in-out;
    background-color: #48aaff;
    color: black;
    }

    .submit-button:hover,.submit-button:focus{
    background-color: #e1f1f1 ;
    }

    .select-user{
        margin: auto;
        margin-top: 5px;
        padding: 20px 0;
        text-align: center;
        border: 1px solid black;
        background-color:white;
        height: 200px;
        line-height: 200px;
        border-radius: 10px;
    }
    .bank{
        text-align:center;
        padding:50px 0px;   
        
    }
    .bank>img{
        width:auto;
        height:400px;
        border-radius:100px;

    }

    .amount-transfer{
        margin: auto;
        padding: 10px;
        text-align: center;
        border: 1px solid black;
        height: 230px;
        background-color:white;
        border-radius: 10px;
    }

    label{
        color: black;
        
    }

    .number{
        order: 1.5px solid #9dd1ff;
        border-radius: 10px;
        color: #348efe;
        display: inline-block;
        padding: 17px 30px;
        text-decoration: none;
        margin: 25px 0;
        background-color: #48aaff;
    }

    </style>