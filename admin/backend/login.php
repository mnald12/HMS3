<?php
    
    session_start();

	include 'connection.php';

	$username = $conn->real_escape_string($_POST['user']);
	$password = sha1($conn->real_escape_string($_POST['pwd']));

		$query = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";
		$result = $conn->query($query);
		
		if($result->num_rows){
            
			while ($row = $result->fetch_assoc()) {
				$_SESSION['id'] = $row['id'];
				$_SESSION['username'] = $row['username'];
			}

            header('location: ../dashboard.php');

		}else{
			$_SESSION['login-message'] = 'Username or password is incorrect!';
            header('location: ../index.php');
		}

?>