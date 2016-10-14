<?php
session_start();
$server = 'localhost';
$username = 'root1';
$password = '';
$db = 'db_pahiram';
$conn = new mysqli($server,$username,$password,$db);
if($conn->connect_error){
	die ('Failed'.$conn->connect_error);
}

if($_SERVER['REQUEST_METHOD'] == "POST"){
	$_SESSION["itemname"] = $_POST['itemname'];
}

	echo "<h2>ItemName : ".$_SESSION["itemname"]."</h2>";

//for item details
$sql = "SELECT * from tbl_item where ItemName = '".$_SESSION["itemname"]."' and Username ='".$_SESSION["username"]."'";
$result = $conn->query($sql);
if($result->num_rows>0){
	    while($row = $result->fetch_assoc()) {
			echo "<br>";
			echo "Price : P".$row['Price']."<br>";
			echo "Location : ".$row['Address']."<br>";
			echo "Category : ".$row['category']."<br>";
			echo "Description : ".$row['Description']."<br>";
			echo "<center><image src='uploads/".$row['image1']."' height='350px' width='350px'> ";
			echo "<image src='uploads/".$row['image2']."' height='350px' width='350px'> ";
			echo "<image src='uploads/".$row['image3']."' height='350px' width='350px'><hr>";
			echo "<h2>Comments</h2></center>";
		}
	}
//for item comments
$sql = "SELECT * from tbl_comment where ItemName = '".$_SESSION["itemname"]."' and Username ='".$_SESSION["username"]."'";
$result = $conn->query($sql);
if($result->num_rows>0){
	    while($row = $result->fetch_assoc()) {
			echo "<br>";
			echo "<h3>".$row['CustomerName']." :</h3>";
			echo $row['Comment']."<br><br>";
			echo "<input type='submit' name='deal' value='DEAL'><hr>";
		}
	}

?>
<html>
	<head>
	
	
	</head>
	<body>
	</body>
</html>