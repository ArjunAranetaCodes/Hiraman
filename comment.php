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
		if(isset($_POST['submit'])){
	$sql = "INSERT INTO tbl_comment (Username,ItemName,CustomerName,Comment) VALUES ('".$_SESSION["username"]."','".$_SESSION["itemname"]."','".$_SESSION["customername"]."','".$_POST['comment']."')";
	
	if($conn->query($sql) == true){
		echo "Success";
		header('Refresh: 1; URL=home.php');
		}
	else{
		echo "failed";
		header('Refresh: 1; URL=itemcomment.php');
		}
		}
}
?>