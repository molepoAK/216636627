<?php
session_start();
include "../db_conn.php";

if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['name']) && isset($_POST['re_password'])) {

	function test_input($data) {
	  $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$username = test_input($_POST['username']);
	$password = test_input($_POST['password']);

	$name = test_input($_POST['name']);
	$re_password = test_input($_POST['re_password']);
	
	$user_data = 'username='. $username. '&name='. $name; //'password='. $password. 're_password='. $re_password;
	


	if(empty($username)) {
		header("location: ../signup.php?error=User Name is required");
		exit();
	}
	  else if(empty($password)) {
		header("location: ../signup.php?error=Password is required");
		exit();
	}
	   else if(empty($re_password)) {
		header("location: ../signup.php?error=Re password is required");
		exit();
	}
	   else if(empty($name)) {
		header("location: ../signup.php?error=Name is required");
		exit();
	
    }else if($password !== $re_password) {
    	header("location: ../signup.php?error= Password confirmation do not match");
    	exit();
    }

      else {
      	$password = $password;

      	$sql = "SELECT * FROM users WHERE username='$username' ";
      	$result = mysqli_query($conn, $sql);

      	if (mysqli_num_rows($result) > 0) {
      		header("location: ../signup.php?error= The user name is already taken, try another");
    	exit();
      	}else{
      		$sql2 = "INSERT INTO users(username, password, name) VALUES('$username', '$password', '$name') ";
      		$result2 = mysqli_query($conn, $sql2);
      		if ($result2) {
      			header("location: ../signup.php?success= Your account has been created successfully");
    	  exit();
	         }else{
	         	header("location: ../signup.php?error= unkwown error occurred");
	    	exit();
         }

      	}

}

}else{
	header("location: ../signup.php");
	exit();
}