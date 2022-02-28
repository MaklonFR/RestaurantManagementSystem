<?php
	//print_r($_POST);
	include '../includes/koneksi.php';
	if (!isset($_SESSION)) {

		session_start();
		
	}
	include '../includes/koneksi.php';
    	$email   	 = $_POST['user'];
		$password    = $_POST['pass'];

		$sql = "SELECT * FROM user WHERE (( username = '$email') AND (Password='$password'))";
		$query = $conn->query($sql);

		if($query->num_rows < 1){	
			$_SESSION['error'] = 'Cannot find account with the username';
			echo "ERROR";
		} 
		else
		{
			$row = $query->fetch_assoc();
			echo "OK";
			$_SESSION['admin']     = $row['id_user'];
            $sql = "SELECT * FROM user WHERE id_user = '".$_SESSION['admin']."'";
            $query = $conn->query($sql);
            $user = $query->fetch_assoc();
		
		}


	

?>