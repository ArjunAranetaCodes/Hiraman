<?php
$server = 'localhost';
$username = 'root1';
$password = '';
$db = 'db_pahiram';
$conn = new mysqli($server,$username,$password,$db);
if($conn->connect_error){
	die ('Failed'.$conn->connect_error);
}



if($_SERVER['REQUEST_METHOD'] == "POST"){
		include ("upload1.php");
		echo "<br>";
		include ("upload2.php");
		echo "<br>";
		include ("upload3.php");
if(isset($_POST['upload'])){
	/*echo $_POST['itemname']."<br />";
	echo $_POST['price']."<br />";
	echo $_POST['description']."<br />";
	echo $_POST['address']."<br />";
	echo $_POST['category']."<br />";
	echo $_FILES['item1']['name']."<br />";
	echo $_FILES['item2']['name']."<br />";
	echo $_FILES['item3']['name']."<br />";*/
	
	//die();
	$sql = "INSERT INTO tbl_item (ItemName,Price,Description,Address,category,image1,image2,image3) VALUES ('".$_POST['itemname']."','".$_POST['price']."','".$_POST['description']."','".$_POST['address']."','".$_POST['category']."','".$_FILES['item1']['name']."','".$_FILES['item2']['name']."','".$_FILES['item3']['name']."')";
	
	if($conn->query($sql) == true){
		echo "Success";
		//header('Refresh: 1; URL=index.php');
		}
	else{
		echo "failed";
		//header('Refresh: 1; URL=upload.php');
}}

}
?>
<html>
	<head>		
		<link rel="stylesheet" href="css/bootstrap.css" media="screen">
		<link rel="stylesheet" href="css/custom.min.css">
		<link rel="stylesheet" href="css/style.css">
		<style type="text/css">
			input[type="submit"]{
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
			form{
				padding-left:100px;
				padding-right:100px;
			}
		</style>	
	</head>
	<body>
	<form action ="<?php $_SERVER['PHP_SELF']; ?>" method="POST"  enctype="multipart/form-data">
		<div class="row">
		<div class="col-md-12">
			<a href="index.php" class="btn btn-danger btnFull">Back</a>
			<hr />
			<div class="form-group">
				<label class="control-label" for="itemName">Item Name</label>
				<input type="text" class="form-control" id="itemName" name="itemname">
			</div>
			
			<div class="form-group">
				<label class="control-label" for="itemPrice">Price</label>
				<input type="number" class="form-control" id="itemPrice" name="price">
			</div>
			
			<div class="form-group">
				<label class="control-label" for="itemCategory">Category</label>
				<select type="text" name="category" id= "itemCategory" class="form-control">
					<option>--Choose Here--</option>
					<option>Hardware</option>
					<option>Vehicle</option>
					<option>House Items</option>
					<option>Others</option>
				</select><br>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="address">Address</label>
				<input type="text" class="form-control" id="address" name="address">
			</div>
			
			<div class="form-group">
				<label class="control-label" for="description">Description</label>
				<textarea rows="4" cols="50" name="description" id="description" class="form-control"></textarea>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="item1">Item Image 1</label>
				<input type="file" name="item1" id="item1" class="btn-file"></input>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="item2">Item Image 2</label>
				<input type="file" name="item2" id="item2"></input>
			</div>
			
			<div class="form-group">
				<label class="control-label" for="item3">Item Image 3</label>
				<input type="file" name="item3" id="item3"></input>
			</div>

			<input type="submit" name="upload" value="Upload" class="btn btn-success "></input>
		</div>
		</div>
      </form>
	</body>
	   <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>

<!--UPLOADER'sNAME///, ItemName, Price, Description, Address, type, image1, image2, image3 -->
<!--Borrower's Name///, ItemName, Price, Description, address, images, type, Uploader's Name, Message -->