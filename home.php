<?php

    $emailadd = $_POST["emailaddress"];
    $whatsapp = $_POST["whatsappnum"];
    $studentname = $_POST["studentname"];
    $schoolname = $_POST["schoolname"];
//send mail
    $msg = "Registration sucessfull for ";
    $msg = wordwrap($msg,70);
    mail($emailadd,"Registration sucessfull",$studentname);
    // Database connection
	$conn = new mysqli('localhost','root','','test1');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into registration(emailadd ,whatsappnum ,studentname ,schoolname) values(?, ?, ?, ?)");
		$stmt->bind_param("ssss", $emailadd, $whatsapp, $studentname, $schoolname);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}

?>