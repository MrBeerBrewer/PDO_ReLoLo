<?php
	#Disallow direct access to this file later #n1, santosh, 8/4/16

	$host="localhost"; $dbname="login"; $user="santosh"; $pass="DBP455!123";
	try {	#Database handler
			$dbh = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
			$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
			if ($dbh) {
				#echo "I was able to connect to database: $dbname, as :$user";
			} else{
				echo "Something is wrong. Please try again later.";
			}
		}
			catch(PDOException $e){
			echo $e->getMessage();
			}