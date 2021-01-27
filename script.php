<?php
	include_once('config.php');
	
  
  $db = mysqli_connect("localhost", "root", "", "memology");

  
  $msg = "";

  
  if (isset($_POST['submit'])) {
  	
	  
	  define('UPLOAD_DIR', 'images/');
	$img = $_POST['imgBase64'];
	$img = str_replace('data:image/png;base64,', '', $img);
	$img = str_replace(' ', '+', $img);
	$data = base64_decode($img);
	$uniqid1 = uniqid() . '.png';
	$file = UPLOAD_DIR . $uniqid1;
    $success = file_put_contents($file, $data);
		    
	  $username = $_SESSION['username'];
	  $sqli = "SELECT id FROM meme1 WHERE username=:username";

	  $sqli = $conn->prepare($sqli);

	  $sqli->bindParam(':username', $username);

	  $sqli->execute();

      $id2 = $sqli->fetch();
	  $sql = "INSERT INTO images (image, user_id) VALUES ('$uniqid1', '$id2[id]')";
  	
	  
  	mysqli_query($db, $sql);

  	if (move_uploaded_file($uniqid1)) {
		  $msg = "Image uploaded successfully";
		  $file = UPLOAD_DIR . $uniqid1;
	      $success = file_put_contents($file, $data);
  	}else{
  		$msg = "Failed to upload image";
  	}
  }
  $username = $_SESSION['username'];
	  $sqli = "SELECT id FROM meme1 WHERE username=:username";

	  $sqli = $conn->prepare($sqli);

	  $sqli->bindParam(':username', $username);

	  $sqli->execute();

      $id = $sqli->fetch();
  $result = mysqli_query($db, "SELECT * FROM images WHERE user_id = $id[id]");



  

	
	

	
	
?>
