<?php 

include "db.php";

if (isset($_POST['update'])) {

    $firstname = $_POST['firstname'];

    $user_id = $_POST['user_id'];

    $lastname = $_POST['lastname'];

    $email = $_POST['email'];

    $password = $_POST['password'];

    $gender = $_POST['gender']; 

    $sql = "UPDATE `users` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`password`='$password',`gender`='$gender' WHERE `id`='$user_id'"; 

    $result = $conn->query($sql); 

    if ($result == TRUE) {

        echo '<div class="alert alert-success" role="alert">';
        echo 'Record updated successfully.';
        echo '</div>';
        echo "<script>console.log('Record updated successfully.');</script>";
        header( "refresh:2; url=./view.php" ); 

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $first_name = $row['firstname'];

            $lastname = $row['lastname'];

            $email = $row['email'];

            $password  = $row['password'];

            $gender = $row['gender'];

            $id = $row['id'];

        } 

    ?>

    <html>
    <head>
        <title>User Update Form</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container">
        <h2>User Update Form</h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            <div class="form-group">
                <label for="firstname">First name:</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $first_name; ?>">
            </div>

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <div class="form-group">
                <label for="lastname">Last name:</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $lastname; ?>">
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
            </div>

            <div class="form-group">
                <label for="gender">Gender:</label><br>
                <input type="radio" name="gender" value="Male" <?php if($gender == 'Male'){ echo "checked";} ?>> Male
                <input type="radio" name="gender" value="Female" <?php if($gender == 'Female'){ echo "checked";} ?>> Female
            </div>

            <input type="submit" class="btn btn-primary" value="Update" name="update">

          </fieldset>

        </form> 
    </div>

    </body>
    </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?>