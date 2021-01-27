
<!DOCTYPE html>
<html lang="en">
<head>
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
.bluh {
  position: relative;
  text-align: center;
  color: white;
}

.bat {
  position: absolute;
    bottom: 143px;
   left: 357px;
   font-size: 25px;
    padding: 15px;
}
.bat2{
  position: absolute;
    bottom: 143px;
    right: 357px;
    font-size: 25px;
    padding: 15px;;
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
</style>

</head>
<body>
<?php 
 include_once('config.php'); 
 
 if(empty($_SESSION['username']))
	{
		header('Location: login.php');
	}
  
?>

<nav class=" clearfix navbar-expand-sm bg-light navbar-light border-bottom border-secondary">
  
  <a class="navbar-brand" href="#" style="padding: 7px;">
  
    <img src="21.png" alt="..." class="float-left" style="width:86px;">
    <h1 style="font-family: 'Balsamiq Sans', cursive; padding-top: 7px;">Memology</h1>
  </a>
  
 
  
  <ul class="navbar-nav clearfix float-right" style="margin-top: 19px;
    margin-right: 32px;">
    <li class="nav-item">
    <a class="nav-link" href="profile.php"> Welcome, <strong> <?php echo $_SESSION['username']; ?> </strong></a>
    </li>
    <li class="nav-item">
    <a class="btn btn-outline-secondary" href="logout.php" >Log Out </a>
    </li>
  </ul>
  
  
</nav>

<div class="bluh">
<img src="meme4.jpg" alt="Snow" class="img-fluid" style="width:100%; opacity: 0.3;">
<h5 class="text">Welcome to Memeology</h5>
<p  class="text2">Where the line is always crossed</p>
<button type="button" class="bat btn btn-dark shadow-lg rounded"><a href="index3.php" style="color:white; text-decoration: none;">CREATE MEME</a></button>
<button type="button" class="bat2 btn btn-secondary shadow-lg rounded">UPLOAD MEME</button>
</div>

  


  
<div class="container-fluid" style="text-align: center; margin-top: 40px;">
  <h3>Latest new Memes</h3>
  <p>There are the latest memes that are being used online.</p>
  </div>
 
  <div class="row no-gutters bg-light position-relative shadow rounded"  style="margin: 50px;">
  <div class="col-md-6 mb-md-0 p-md-4">
    <img src="wood-meme-list.jpg" class="w-100" alt="...">
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
    <h5 class="mt-0">Columns with stretched link</h5>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <small class="text-muted">Uploaded: Yesterday </small>
  </div>
</div>

<div class="row no-gutters bg-light position-relative shadow rounded "  style="margin: 50px;">
  <div class="col-md-6 mb-md-0 p-md-4">
    <img src="2020-03-31_13_122020-03-30_12_2620200402_Best-Thursday-quarantine-memes.jpg" class="w-100" alt="...">
  </div>
  <div class="col-md-6 position-static p-4 pl-md-0">
    <h5 class="mt-0">Columns with stretched link</h5>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <small class="text-muted">Uploaded: Last Week</small>
  </div>
</div>
<div class="row no-gutters bg-light position-relative shadow rounded"  style="margin: 50px;">
  <div class="col-md-6 mb-md-0 p-md-4">
    <img src="_100893887_1921meme.jpg" class="w-100" alt="...">
  </div>
  
  <div class="col-md-6 position-static p-4 pl-md-0">
    <h5 class="mt-0">Columns with stretched link</h5>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
    <small class="text-muted">Uploaded: Last Week</small>
  </div>
</div>
 


<footer class="page-footer font-small bg-dark">

<!-- Copyright -->
<div class="footer-copyright text-center py-3"><div style="    margin-bottom: 10px">
<a href="#" style="color:white;"><i data-feather="twitter"></i></a>
<a href="#" style="color:white;"><i data-feather="instagram"></i></a>
<a href="#" style="color:white;"><i data-feather="facebook"></i></a>
</div>
<p style="color:white; ">© 2020 Copyright: LLC Memology</p>
</div>
<!-- Copyright -->

</footer>

 <script>
      feather.replace()
    </script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


    
</body>
</html>