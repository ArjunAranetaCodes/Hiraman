
<html>
	<head>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css">
		<style>
	  .btn-link{
	  border:none;
	  outline:none;
	  background:none;
	  cursor:pointer;
	  color:#0000EE;
	  padding:0;
	  text-decoration:underline;
	  font-family:inherit;
	  font-size:inherit;
	}
	#btn-link2{
	  border:none;
	  outline:none;
	  background:none;
	  cursor:pointer;
	  padding:0;
	  font-family:inherit;
	  font-size:inherit;
	}
		</style>
	<head>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css">
	<style type="text/css">
		input[type="submit"], .btnHome{
			width:200px;
		}
		
		.btnFull{
			width:80px;
			height:80px;
			text-align:center;
			vertical-align:middle;
			padding-top:20px;
			border-radius:50%;
			font-size:18px;
		}
		body{
			padding-left:100px;
			padding-right:100px;
		}
		.col-md-4{
			text-align:center;
		}
		
		.col-md-4 img{
			max-width:250px;
			text-align:center;
			margin:0px auto;
		}
		
		.col-md-9{
			padding-bottom:20px;
		}
		
		.itemLabel{
			font-family:Corbel;
			font-size:20px;
		}
		
		.btn-link{
			font-family:Segoe UI;
			font-size:30px;
		}
	</style>
	</head>
	<body>
		<div class="form-group">
			<a href="index.php" class="btn btn-primary btn-lg btnHome">Home</a>
		</div>
		
		<form action ="<?php $_SERVER['PHP_SELF']; ?>" method="POST" class="input-group">
			<input type="text" class="form-control" name="itemname" placeholder="Search Item Name or Category">
			<span class="input-group-btn">
				<input type="submit" name="search" value="search" class="btn btn-info"></input>
			</span>
		</form>		
<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
$server = 'localhost';
$username = 'root1';
$password = '';
$db = 'db_pahiram';
$conn = new mysqli($server,$username,$password,$db);


if($conn->connect_error){
	die ('Failed'.$conn->connect_error);
}
if(isset($_POST['search'])){
	$searchitem = $_POST['itemname'];

$sql = "SELECT * from tbl_item where ItemName LIKE '%{$searchitem}%'";
$result = $conn->query($sql);
if($result->num_rows>0){
	    while($row = $result->fetch_assoc()) {
			echo '<div class="col-md-12">';
			echo '<div class="col-md-3 itemLabel">';
			echo '<form action="itemcomment.php" method="post">';
			echo '<button type="submit" name="itemname" value="'.$row['ItemName'].'" class="btn-link">'.$row['ItemName'].'</button><br>';
			echo 'By : <input type="text" name="Username" value="'.$row['Username'].'" id="btn-link2" disabled></input><br>';
			echo "</form>";
			echo "Price : P".$row['Price']."<br>";
			echo "Location : ".$row['Address']."<br>";
			echo "</div>";
			
			echo '<div class="col-md-9">';
			echo '<div class="col-md-4">';
			echo "<image src='uploads/".$row['image1']."'> ";
			echo "</div>";
			echo '<div class="col-md-4">';
			echo "<image src='uploads/".$row['image2']."'> ";
			echo "</div>";
			echo '<div class="col-md-4">';
			echo "<image src='uploads/".$row['image3']."'>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}
}
else{
}
}
}
else{
//if($_SERVER['REQUEST_METHOD'] == "POST"){
$server = 'localhost';
$username = 'root1';
$password = '';
$db = 'db_pahiram';
$conn = new mysqli($server,$username,$password,$db);


if($conn->connect_error){
	die ('Failed'.$conn->connect_error);
}
//if(isset($_POST['search'])){
$sql = "SELECT * from tbl_item";
$result = $conn->query($sql);
if($result->num_rows>0){
	    while($row = $result->fetch_assoc()) {
			
			echo '<div class="col-md-12">';
			echo '<div class="col-md-3 itemLabel">';
			echo '<form action="itemcomment.php" method="post">';
			echo '<button type="submit" name="itemname" value="'.$row['ItemName'].'" class="btn-link">'.$row['ItemName'].'</button><br>';
			echo 'By : <input type="text" name="Username" value="'.$row['Username'].'" id="btn-link2" disabled></input><br>';
			echo "</form>";
			echo "Price : P".$row['Price']."<br>";
			echo "Location : ".$row['Address']."<br>";
			echo "</div>";
			
			echo '<div class="col-md-9">';
			echo '<div class="col-md-4">';
			echo "<image src='uploads/".$row['image1']."'> ";
			echo "</div>";
			echo '<div class="col-md-4">';
			echo "<image src='uploads/".$row['image2']."'> ";
			echo "</div>";
			echo '<div class="col-md-4">';
			echo "<image src='uploads/".$row['image3']."'>";
			echo "</div>";
			echo "</div>";
			echo "</div>";
		}



}
else{
}
//}
//}
}
?>

	</body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>