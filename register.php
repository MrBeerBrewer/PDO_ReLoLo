<?php 
	
	require('includes\connect.php');
	define("NL", "<br/>");
	
	if (isset($_POST['subButton'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];

		#check if email already registered.
		$stmt = $dbh->prepare("SELECT * from login WHERE email=?");
		$stmt->bindParam(1, $email);
		$stmt->execute();

		if ($stmt->rowCount() > 0) {
			echo "$email is already registered.";
		} 
		else{ #Register user.
		$stmt = $dbh->prepare("INSERT INTO login (name,email) VALUES (:name,:email)");
		$stmt->bindParam(':name', $name);
		$stmt->bindParam(':email', $email);
		$res = $stmt->execute();

		if ($res) { #Update pass
			$password = rand(13597,99629); 
			$stmt = $dbh->prepare("UPDATE login SET password = ? WHERE email=?");
			$stmt->bindParam(1, $password);
			$stmt->bindParam(2, $email);
			$res = $stmt->execute();
			if ($res) { #Show pass.
				echo "Your username is $name and password is $password.";
				} 		
		}	#Update pass ends

	}#Create user flow ends
}#End main branch.
	
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
	<h1 class="text-center">Please register to access rewards system.</h1>
	  <!-- <div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
	  	<img class="img-responsive" src="http://placehold.it/750x450" alt="Chania">
	  </div> -->

	  <div class=" col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
	  			<form action="" method="POST" class="">
				
					<span class="glyphicon glyphicon-user"></span>
					<input type="text" name="name" id="name" placeholder="Name"
					data-toggle="tooltip" data-placement="right" title="Your full name.">
					
					<span class="glyphicon glyphicon-envelope"></span>
					<input type="text" name="email" id="email" placeholder="Email address"
					data-toggle="tooltip" data-placement="right" title="Your email address.">
					
					<input type="submit" name="subButton" id="subButton" value="Register">
					
				
			</form>
		<a href="/login/">Back to main page</a>
		</div>

	  <!-- <div class=" col-xs-4 col-sm-4 col-md-4 col-lg-4 ">
	  	<div class="embed-responsive embed-responsive-16by9">
	  			    <iframe class="embed-responsive-item" src="http://www.youtube.com/embed/XGSy3_Czz8k"></iframe>
	  			</div>
	  </div> -->
	</div>
	</div><!--End container -->

	<script>
	$(document).ready(function(){
	    $('[data-toggle="tooltip"]').tooltip(); 
	});
	</script>
	</body>
	</html>