<?php
 session_start();
 
if ($_SERVER["REQUEST_METHOD"] == "POST"){
 
	$server = "localhost";
	$serverusername = "root1";
	$serverpassword = "";
	$databasename = "db_pahiram";
	$conn = new mysqli ($server,$serverusername,$serverpassword,$databasename);
	
	if($conn->connect_error){
		die ("Error :".$conn->connect_error);
	}
	
	if(isset($_POST["username"])){		
		$query = "select * from tbl_acct where username = '".$_POST["username"]."' and
		password = '".$_POST["password"]."'";
		$result = $conn->query($query);
		if($result->num_rows>0){
			while($rows = $result->fetch_assoc()){
				$_SESSION["ID"] = $rows["ID"];
				$_SESSION["username"] = $rows["username"];
				header ("location: index.php");
			}
				
		}else{
			echo '<script type="text/javascript">alert("Failed to Login");
				window.location="index.php";
			</script>';
		}
		
	}
	if(isset($_POST["register"])){
		header ("location: registerpahiram.php");
	}
	
	
}

if(isset($_SESSION["username"])){
	header ("location: index.php");
}
?>