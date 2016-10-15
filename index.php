<?php
	session_start();
?>
<html>
	<head>
    <link rel="stylesheet" href="css/bootstrap.css" media="screen">
    <link rel="stylesheet" href="css/custom.min.css">
	<style type="text/css">
		input[type="submit"]{
			width:100%;
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
			padding-left:20px;
			padding-right:20px;
		}
		.jumbotron{
			background:url('img/hiraman.png');
			background-repeat:no-repeat;
			background-position:center;
			background-size:260px 130px;
			height:100px;
		}
	</style>
	
	</head>
	<body>
		<!--
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
				<div class="navbar-header">
					<a href="index.php" class="navbar-brand">Hiraman</a>
					<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
				</div>
				<div class="navbar-collapse collapse" id="navbar-main">
					<ul class="nav navbar-nav">
						<li><a href="">Home</a></li>
					</ul>
				</div>
			</div>
		</div>
		-->
		
		<div class="jumbotron">
			
		</div>
		
		
		<div class="col-md-12">
			<form action="upload.php" class="form-group col-md-4">
			<?php
				if(isset($_SESSION['username'])){
					echo '<input type="submit" value="Upload an Item" class="btn btn-primary btn-lg"/>';
				}
			?>
			</form>
			<form action="home.php" class="form-group col-md-4">
				<input type="submit" value="Search" class="btn btn-danger btn-lg"/>
			</form>
			<?php
				if(isset($_SESSION['username'])){
					echo '
					<form action="myItem.php" class="form-group col-md-4">
						<input type="submit" value="My Items" class="btn btn-info btn-lg"/>
					</form>';
				}
			?>
		</div>
		<div class="col-md-12">		
			<?php
				if(!isset($_SESSION['username'])){
					echo '
					<form action="login.php" method="post">
						<div class="alert alert-danger">
						  <center><h4>You are currently not logged in.</h4></center>
						</div>
					
						<div class="form-group">
							<label class="control-label" for="Username">Username</label>
							<input type="text" class="form-control" id="Username" name="username">
						</div>	
						<div class="form-group">
							<label class="control-label" for="Password">Password</label>
							<input type="password" class="form-control" id="Password" name="password">
						</div>						
						
						<div class="form-group">
							<input type="submit" name="upload" name= "login" value="Login" class="btn btn-success "></input>
						</div>
					</form>';
				}else{
					echo '
					<form action="login.php" method="post">
						<div class="alert alert-success">
						  <center><h4>Welcome '.$_SESSION['username'].' |
						  <a href="logout.php">Log-out</a></h4></center>
						</div>	
					</form>';
				}
			?>
		</div>
	</body>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
</html>