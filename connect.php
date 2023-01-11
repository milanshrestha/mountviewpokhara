<?php
	$name = $_POST['name'];
	$email = $_POST['email'];
	$checkinDate = $_POST['checkindate'];
	$checkoutDate = $_POST['checkoutdate'];
	$rooms = $_POST['rooms'];
	$numberofpeople = $_POST['number'];
	$contact = $_POST['contact'];
	$submit = $_POST['submit'];


	// Database connection
	$conn = new mysqli('localhost','root','','mountviewpokhara');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		
		$stmt = $conn->prepare("insert into booking(name, email, checkinDate, checkoutDate, rooms, numberofpeople, contact) values(?, ?, ?, ?, ?, ?,?)");
		$stmt->bind_param("ssssssi", $name, $email, $checkinDate, $checkoutDate, $rooms, $numberofpeople, $contact);
		$execval = $stmt->execute();
		if($execval == true)
		// echo $execval;
		echo "Registration completed successfully...<br>Our staff will connect with you shortly.";
		header('location:thankyou.html');
		$stmt->close();
		$conn->close();
	}
	
?>
  
  