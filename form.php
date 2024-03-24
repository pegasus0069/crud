<?php 
include "db.php";

  if (isset($_POST['submit'])) {

    $first_name = $_POST['firstname'];

    $last_name = $_POST['lastname'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $gender = $_POST['gender'];

    $sql = "INSERT INTO `users`(`lastname`, `firstname`, `email`, `password`, `gender`) VALUES ('$last_name','$first_name','$email','$password','$gender')";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo '<div class="alert alert-success" role="alert">New record created successfully!</div>';
      echo "<script>console.log('New record created successfully!');</script>";
      header( "refresh:2; url=./view.php" ); 

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close();

  }
?>

<!DOCTYPE html>

<html>

<head>
  <title>Signup Form</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

<div class="container">
  <h2>Signup Form</h2>

  <form action="" method="POST">

    <fieldset>

      <legend>Personal information:</legend>

      <div class="form-group">
        <label for="firstname">First name:</label>
        <input type="text" class="form-control" name="firstname" id="firstname">
      </div>

      <div class="form-group">
        <label for="lastname">Last name:</label>
        <input type="text" class="form-control" name="lastname" id="lastname">
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" name="email" id="email">
      </div>

      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>

      <div class="form-group">
        <label for="gender">Gender:</label><br>
        <input type="radio" name="gender" value="Male">Male
        <input type="radio" name="gender" value="Female">Female
      </div>

      <input type="submit" name="submit" value="Submit" class="btn btn-primary">

    </fieldset>

  </form>
</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>