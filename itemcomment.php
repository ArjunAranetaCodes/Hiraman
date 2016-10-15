
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
			padding-left:20px;
			padding-right:20px;
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
		.jumbotron{
			background:url('img/hiraman.png');
			background-repeat:no-repeat;
			background-position:center;
			background-size:260px 130px;
			height:100px;
		}
		.input-group{
			margin-bottom:10px;
		}
	</style>
	</head>
	
	
	</head>
	<body>
		
		<div class="jumbotron">
			
		</div>
		
		<div class=" input-group" style="width:100%;">
			<a href="index.php" class="btn btn-primary btn-lg btnHome " style="width:100%;">Home</a>
		</div>
	
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
		$_SESSION["user"] = $_POST['user'];
		$_SESSION["customername"] = "customer name sample 1";
	}

		echo "ItemName : ".$_SESSION["itemname"]."<br>";
		echo "By : ".$_SESSION["user"]."<br>";


	$sql = "SELECT * from tbl_item where ItemName = '".$_SESSION["itemname"]."' and Username ='".$_SESSION["user"]."'";
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
	
		<form action ="comment.php" method="POST">
			<label>Message :</label><br>
				<textarea rows="5" cols="50" name="comment"></textarea><br>
			<input type="submit" value="submit" name="submit">
		</form>
	</body>
</html>