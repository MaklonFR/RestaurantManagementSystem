<?php
	include 'koneksi.php';
	if (!isset($_SESSION)) {
		session_start();	
	}

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		header('location: ../dashboard.php?#');
	}

	$sql = "SELECT * FROM user WHERE id_user = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();

	
?>