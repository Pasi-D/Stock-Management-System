<?php 
	session_start();


	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "123"; #Erase Password
	$db_name = "stock_inventory"; #Change the database

	$non=mysqli_connect($dbhost,$dbuser,$dbpass,$db_name) or die("Can't connect to server");

	//Get values passed from index.html
	$usrname = $_POST['uname'];
	$pwd = $_POST['psw'];

	if (empty($usrname)) {
		exit();
	}else{
		$sql = "SELECT username, is_Admin FROM login WHERE username = '$usrname' AND password = '$pwd'";

		$result = mysqli_query($non,$sql);

		while($row=mysqli_fetch_array($result)) {
		$name=$row["0"];
		$isAdmin = $row["1"];
		}

		if (mysqli_affected_rows($non)==0) {
			echo "Username or password is incorrect";
				
		}else{
			$_SESSION['UName'] = $name;
			if ($isAdmin == 'Y') {
				#Add Admin Page Location here
			}else{
				header("Location: ../home/User");
			}						
			exit;
		}

	}

 ?>