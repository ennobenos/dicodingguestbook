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

  <form method="post" action="index.php" enctype="multipart/form-data">
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
      <label>Comment</label>
      <textarea name="comment" cols="60" rows="3" id="comment"></textarea>
    </div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="reg_user">Register</button>
      <button type="submit" class="btn" name="load_data">Load Data</button>
  	</div>
  </form>
  <?php
  $host = "dicodingguestbook.database.windows.net";
  $user = "enno";
  $pass = "1Q@w3e4r5t";
  $db = "dicodingguestbook";
  try {
      $conn = new PDO("sqlsrv:server = $host; Database = $db", $user, $pass);
      $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
  } catch(Exception $e) {
      echo "Failed: " . $e;
  }
  if (isset($_POST['reg_user'])) {
      try {
          $errors = array();
          $name = $_POST['name'];
          $email = $_POST['email'];
          $mobilenumber = $_POST['mobilenumber'];
          $comment = $_POST['comment'];

          if (empty($name)) { array_push($errors, "Name is required"); }
          if (empty($email)) { array_push($errors, "Email is required"); }
          if (empty($mobilenumber)) { array_push($errors, "Mobile number is required"); }
          if (empty($comment)) { array_push($errors, "Comment is required"); }
          if (count($errors) == 0) {
            // Insert data
            $sql_insert = "INSERT INTO Guest (name, email, mobilenumber, comment)
                        VALUES (?,?,?,?)";
            $stmt = $conn->prepare($sql_insert);
            $stmt->bindValue(1, $name);
            $stmt->bindValue(2, $email);
            $stmt->bindValue(3, $mobilenumber);
            $stmt->bindValue(4, $comment);
            $stmt->execute();
            echo "<h3>Your're registered!</h3>";
          } else {
            echo $errors;
          }
      } catch(Exception $e) {
          echo "Failed: " . $e;
      }
  } else if (isset($_POST['load_data'])) {
      try {
          $sql_select = "SELECT * FROM Guest";
          $stmt = $conn->query($sql_select);
          $registrants = $stmt->fetchAll();
          if(count($registrants) > 0) {
              echo "<h2>People who are registered:</h2>";
              echo "<table>";
              echo "<tr><th>Name</th>";
              echo "<th>Email</th>";
              echo "<th>Mobile Number</th>";
              echo "<th>Comment</th></tr>";
              foreach($registrants as $registrant) {
                  echo "<tr><td>".$registrant['name']."</td>";
                  echo "<td>".$registrant['email']."</td>";
                  echo "<td>".$registrant['mobilenumber']."</td>";
                  echo "<td>".$registrant['comment']."</td></tr>";
              }
              echo "</table>";
          } else {
              echo "<h3>No one is currently registered.</h3>";
          }
      } catch(Exception $e) {
          echo "Failed: " . $e;
      }
  }
  ?>
</body>
</html>
