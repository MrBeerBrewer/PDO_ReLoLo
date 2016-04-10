<?php
	session_start();
	if (isset($_POST['logout'])) {
		session_destroy();
		header("Location: login.php");
		exit;
	}

	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Members area</title>
</head>
<body>
	<h1>Welcome to members area <?php echo $_SESSION['email']; ?></h1>
	
	<form action="" method="POST" class="">
		<input type="submit" name="logout" id="logout" value="Logout">
	</form>
</body>
</html>