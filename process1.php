<?php
	$fname = $_POST['fname'];
	$mname = $_POST['mname'];
	$lname = $_POST['lname'];
	$gender = $_POST['gender'];
	$username = $_POST['username'];
	$password = $_POST['password'];

	// Database connection
	$conn = new mysqli('localhost','root','','test');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(fname, mname, lname, gender, username, password) 
		values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssi", $fname, $mname, $lname, $gender, $username, $password);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully!";
		$stmt->close();
		$conn->close();
	}
?>