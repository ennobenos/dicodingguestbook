<!--<?php include('server.php') ?>!-->
<!DOCTYPE html>
<html>
<head>
  <title>Dicoding Guest Book</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header">
  	<h2>Guest Book</h2>
  </div>

  <form method="post" action="register.php">
  	<!--<?php include('errors.php'); ?>!-->
  	<div class="input-group">
  	  <label>Name</label>
  	  <input type="text" name="name">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email">
  	</div>
  	<div class="input-group">
  	  <label>Mobile Number</label>
  	  <input type="number" name="mobilenumber">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
      <button type="submit" class="btn" name="load_data">Load Data</button>
  	</div>
  </form>
</body>
</html>
