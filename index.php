<html>
	<head>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css">
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
		<form action="upload.php">
			<input type="submit" value="Upload an Item" class="btn btn-primary btn-lg"/>
		</form>
		<form action="home.php">
			<input type="submit" value="Home" class="btn btn-success btn-lg"/>
		</form>
		<form action="myItem.php">
			<input type="submit" value="My Items" class="btn btn-info btn-lg"/>
		</form>
	</body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>