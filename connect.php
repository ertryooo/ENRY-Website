<?php
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$notelepon = $_POST['notelepon'];
	$tanggal = $_POST['tanggal'];
	$waktu = $_POST['waktu'];
	$jumlahorang = $_POST['jumlahorang'];

	// Database connection
	$conn = new mysqli('localhost','root','','reservasi');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into data_reservasi(nama, email, notelepon, tanggal, waktu, jumlahorang) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("ssiiii", $nama, $email, $notelepon, $tanggal, $waktu, $jumlahorang);
		$stmt->execute();
		echo "Reservation Sent";
		$stmt->close();
		$conn->close();
	}
?>