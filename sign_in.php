<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forms.css">
    <title>BeeMo</title>
</head>
<body>
      <div class="container">
        <div class="box form-box">
        <?php 
             include("config.php");
             // Check for login error message and display it
             if (isset($_SESSION['login_error'])) {
                 echo "<div class='message'>
                       <p>" . $_SESSION['login_error'] . "</p>
                       </div> <br>";
                 unset($_SESSION['login_error']); // Clear the error message
             }
             if(isset($_POST['submit'])){
               $email = mysqli_real_escape_string($con, $_POST['email']);
               $password = mysqli_real_escape_string($con, $_POST['password']);

               // Using prepared statements to prevent SQL injection
               $stmt = $con->prepare("SELECT * FROM registration_form WHERE Email=? AND Password=?");
               $stmt->bind_param("ss", $email, $password);
               $stmt->execute();
               $result = $stmt->get_result();
               $row = $result->fetch_assoc();

               if ($row) {
                   $_SESSION['valid'] = $row['Email'];
                   // Storing password in session is not recommended for security reasons
                   header("Location: contacts.php");
                   exit(); // Ensure no further output after redirect
               } else {
                   // Set the error message in the session
                   $_SESSION['login_error'] = "Wrong Email or Password";
                   // Redirect back to the login page to display the error message
                   header("Location: sign_in.php");
                   exit();
               }
             }
        ?>
            <header>Login</header>
            <form action="" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="submit" value="Login" required>
                </div>
                <div class="field">
                <a href='index.html'><input type="back" class="btn-back" name="btn-back" value="Go Back" required></a>
                </div>
                <div class="links">
                    Don't have an account? <a href="register.php">Sign Up Now</a>
                </div>
            </form>
        </div>
      </div>
</body>
</html>
