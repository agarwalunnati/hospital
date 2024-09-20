<?php
	$Name = $_POST['Name'];
        $age = $_POST['age'];
	$gender = $_POST['gender'];
	$number = $_POST['phone'];
        $email = $_POST['email'];
	// Database connection
	$conn = new mysqli('localhost','root','','hospital');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(Name, age, gender, number, email) values(?, ?, ?, ?, ?)");
		$stmt->bind_param("sisis", $Name, $age, $gender, $number, $email);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>