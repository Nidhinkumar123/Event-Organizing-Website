<?php
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$reason = $_POST['reason'];
	$date = $_POST['date'];
	$address = $_POST['address'];
	$pin = $_POST['pin'];

	// Database connection
	$conn = new mysqli('localhost','root','','event');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(name, phone, email, reason, date, address, pin) values(?, ?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssssss", $name, $phone, $email, $reason, $date, $address, $pin);
		$execval = $stmt->execute();
		echo $execval;
		echo "Contact successfull...";
		$stmt->close();
		$conn->close();
	}
?>