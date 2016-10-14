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
	$_SESSION["username"] = $_POST['Username'];
	$_SESSION["customername"] = "customer name sample 1";
}

	echo "ItemName : ".$_SESSION["itemname"]."<br>";
	echo "By : ".$_SESSION["username"]."<br>";


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
			echo "<image src='uploads/".$row['image3']."' height='350px' width='350px'></center><hr>";
		}
	}

?>
<html>
	<head>
	
	
	</head>
	<body>
		<form action ="comment.php" method="POST">
			<label>Message :</label><br>
				<textarea rows="5" cols="50" name="comment"></textarea><br>
			<input type="submit" value="submit" name="submit">
		</form>
	</body>
</html>