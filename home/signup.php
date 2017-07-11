<?php 
	$DBHOST = "localhost";
 	$DBUSER = "root";
 	$DBPASS = "123";
 	$DBNAME = "stock_inventory";
	//database connection info
	$connect = mysql_connect($DBHOST,$DBUSER,$DBPASS);
	$dbconnect = mysql_select_db($DBNAME); 

	if(!$connect){
		die("Connection Failed: " . mysql_error());
	}

	if (!$dbconnect) {
		die("Database Connection failed : " . mysql_error());
	}

	$username = $_POST['usrname'];
	$email = $_POST['email'];
	$password = $_POST['psw'];
	$isanAdmin = $_POST['isAdmin'];

	$statement = "SELECT * FROM login WHERE username='$username'";
	$stmtres = mysql_query($statement);
	$count = mysql_num_rows($stmtres);

	if ($count == 0) {
		$sql = "INSERT INTO login (	username,email,password,is_Admin)  
    					VALUES ('$username','$email','$password','$isanAdmin')"; 
    	mysql_query($sql) or die("Query failed".mysql_error());
    	echo "<font color='green'><b>Registerd Successfully</b></font>";
    	header("refresh:2 url=./Admin_Panel.html");
	}else{
    	echo "Username exist";
    }		
 ?>