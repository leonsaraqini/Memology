<?php 
 include_once('config.php'); 
 
 if(empty($_SESSION['username']))
	{
		header('Location: login.php');
	}
  
?>
<?php

// Create database connection
$db = mysqli_connect("localhost", "root", "", "memology");

// Initialize message variable
$msg = "";

// If upload button is clicked ...
if (isset($_POST['upload'])) {
  // Get image name
  $image = $_FILES['image']['name'];
  // Get text

  // image file directory
  $target = "images/".basename($image);
  $username = $_SESSION['username'];
  $sqli = "SELECT id FROM meme1 WHERE username=:username";

  $sqli = $conn->prepare($sqli);

  $sqli->bindParam(':username', $username);

  $sqli->execute();

    $id2 = $sqli->fetch();
  $sql = "INSERT INTO images (image, user_id) VALUES ('$image',  '$id2[id]')";
  
  // execute query
  mysqli_query($db, $sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
    $msg = "Image uploaded successfully";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Memology</title>
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&family=Jost:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Fredoka+One&family=Press+Start+2P&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/feather-icons"></script>
<style>

   #content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
   form{
    display: inline-block;
    margin-right: 15px;
    
   }
   form div{
   	margin-top: 5px;
   }
   #img_div{
   	width: 30%;
   	padding: 5px;
   	margin: 15px auto;
   	border: 1px solid #cbcbcb;
   }
   #img_div:after{
   	content: "";
   	display: block;
   	clear: both;
   }
   




.text{
  position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -200%);
    font-family: 'Fredoka One', cursive;
    font-size: 50px;
    color: black;
}

.text2{
  position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -200%);
    font-family: 'Press Start 2P', cursive;
    color: black;
}

#content{
   	width: 50%;
   	margin: 20px auto;
   	border: 1px solid #cbcbcb;
   }
</style>

</head>
<body>
    




<nav class=" clearfix navbar-expand-sm bg-light navbar-light border-bottom border-secondary">
  
  <a class="navbar-brand" href="#" style="padding: 7px;">
  
    <img src="21.png" alt="..." class="float-left" style="width:86px;">
    <h1 style="font-family: 'Balsamiq Sans', cursive; padding-top: 7px;">Memologist</h1>
  </a>
  
 
  
  <ul class="navbar-nav clearfix float-right" style="margin-top: 19px;
    margin-right: 32px;">
     <li class="nav-item">
    <a class="nav-link" href="dashboard.php"> Welcome, <strong> <?php echo $_SESSION['username']; ?> </strong></a>
    </li>
    <li class="nav-item">
    <button type="button" class="bat btn btn-dark " style="margin-right:10px;"><a href="index3.php" style="color:white; text-decoration: none; ">CREATE MEME</a></button>
    </li>
    <li class="nav-item">
    
    </li>
    <form method="POST" action="profile.php" enctype="multipart/form-data" style="display: inline-block;">
  	<input type="hidden" name="size" value="1000000" >
  	
  	  <input type="file" name="image" >
  	
  	
  		<button type="submit" name="upload" class="bat btn btn-secondary ">POST</button>
  	
  </form>
    <li class="nav-item">
    <a class="btn btn-outline-secondary" href="logout.php" >Log Out </a>
    </li>
  </ul>
  
  
</nav>


<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
      	echo "<img id='photo' width='250' height='180' src='images/".$row['image']."' >";
	  echo "</div>";
    }
  ?>



</body>
</html>