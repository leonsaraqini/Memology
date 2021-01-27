<?php 

 include_once('config.php');
require 'config.php';

if(isset($_POST['submit']))
{
	$error = "";


	$username = $_POST['username'];
	$password = $_POST['password'];


	if(empty($username) || empty($password))
	{
		
	 	echo "Ploteso krejt!";
	   	header( "refresh:2; url=login.php" ); 
	}
	else
	{

		$sql = "SELECT id, emri, username, email, password FROM meme1 WHERE username=:username";

		$insertSql = $conn->prepare($sql);

		$insertSql->bindParam(':username', $username);

		$insertSql->execute();


		$data = $insertSql->fetch();



		if($data == false)
		{
			echo "Username <strong> $username </strong> not found!";
			header( "refresh:2; url=login.php" ); 
		}
		else
		{
			if(password_verify($password, $data['password']))
			{

				$_SESSION['id'] = $data['id'];
				$_SESSION['emri'] = $data['emri'];
				$_SESSION['email'] = $data['email'];
				$_SESSION['username'] = $data['username'];
				$_SESSION['password'] = $data['password'];
				
				header('Location:profile.php');
			}
			else
			{
				echo "Password not match!";
				header( "refresh:2; url=login.php" ); 
			}
		}




	}

}
	
?>