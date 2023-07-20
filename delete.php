<button onclick="myFunction()">Try it</button>
<p id="demo"></p>

<script>
function myFunction() {
	 var row = prompt("Please enter which row to delete","");
	 document.getElementById("demo").innerHTML = row;
    window.location.href='delete.php?row='+row;

	 
}
</script>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

if (isset($_GET["row"])) {
	$row = $_GET["row"];
	$sql = "DELETE FROM `students` WHERE `student_id`=".$row;

if ($conn->query($sql) === TRUE) {
		echo "Record deleted successfully";
	} else {
		echo "Error deleting record: " . $conn->error;
	}
}
    $conn->close();
?>