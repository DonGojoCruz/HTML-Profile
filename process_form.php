<?php 
         
 include("config.php");
 if(isset($_POST['submit'])){
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Message = $_POST['Message'];

 //verifying the unique email
 $verify_query = mysqli_query($con,"SELECT Email FROM registration_form WHERE Email !='$email'");

 if(mysqli_num_rows($verify_query) !=0 ){   
    echo "<div class='message'>
              <p>Email does not match!</p>
         </div> <br>";
    echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
 }
    else{
        mysqli_query($con,"INSERT INTO message_form(Name,Email,Message) VALUES('$Name','$Email','$Message')") or die("Error Occured");

        echo "<div class='message'>
                  <p>Message Sent!</p>
             </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
    }
 }else
 ?>