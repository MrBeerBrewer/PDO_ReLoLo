<?php
session_start();	#Fire a session. 1st instance. 
	require('includes\connect.php');
	define("NL", "<br/>");

	#Check if user is already logged in.
	if (isset($_SESSION['email'])) {
		header("Location: members-area.php");
		exit;
	} else{ #Validate pass and login
		if (isset($_POST['logButton'])) {
			$pass = $_POST['pass'];
			$email = $_POST['email'];

			#More validations can be done here.

			#check if pass matches entered email addy
			$stmt = $dbh->prepare("SELECT password FROM login WHERE email=?");
			$stmt->bindParam(1, $email);
			$stmt->execute();
			#var_dump($stmt->fetchColumn());

			if ($stmt->fetchColumn() === $pass) {
				#session_start();
		        $_SESSION['email'] = $email; 

		        header("Location: members-area.php");
		        exit;
			} else{
				echo "$email or $pass incorrect. Can't login.";
			}	
		}
	}
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta charset="utf-8"> 
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Register</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container" >
	<div class="row">
		<h1 class="text-center">Please login to access rewards system.</h1>

	  	<div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	  			<form action="" method="POST" class="">
					<span class="glyphicon glyphicon-envelope"></span>
					<input type="text" name="email" id="email" placeholder="Email address"
					data-toggle="tooltip" data-placement="right" title="Your email address.">
					
					<span class="glyphicon glyphicon-asterisk"></span>
					<input type="text" name="pass" id="pass" placeholder="Password"
					data-toggle="tooltip" data-placement="right" title="Your password.">
					
					
					<input type="submit" name="logButton" id="logButton" value="Login">
				</form>
		<a href="/login/">Back to main page</a>
		</div>
	</div><!--End row -->
	</div><!--End container -->

	<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});
	</script>
	</body>
	</html>