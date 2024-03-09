<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BeeMo</title>
    <link rel="stylesheet" href="contacts_styles.css">
</head>
<body>
        <header>
        <nav>
            <div class="logo"><img src="logo.png" alt=""></div>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="hobbies.html">Hobbies</a></li>
                <li><a href="interests.html">Interests</a></li>
                <li><a href="contacts.php">Login</a></li>
            </ul>
        </nav>
        <section class="contacts" id="contacts">
            
        <?php 
         
         include("config.php");
         if(isset($_POST['submit'])){
            $Fullname = $_POST['Fullname'];
            $Email = $_POST['Email'];
            $Messages = $_POST['Messages'];

                mysqli_query($con,"INSERT INTO message_form(Fullname,Email,Messages) VALUES('$Fullname','$Email','$Messages')") or die("Error Occured");

                // Redirect to the same page
                header("Location: message_sent.html");
                exit;
            }
         else{
         ?>
            <h2 class="heading">Send Feedback</h2>
            <form action="" method="post">
                <div class="input-box">
                    <div class="input-field">
                        <input type="text" name="Fullname" id="Fullname" placeholder="Name (optional)">
                        <span class="focus"></span>
                    </div>
                    <div class="input-field">
                        <input type="text" name="Email" id="Email" placeholder="Email (optional)">
                        <span class="focus"></span>
                    </div>
                </div>
    
                <div class="textarea-field">
                    <textarea name="Messages" id="" cols="30" rows="7" id="Messages" placeholder="Your Message" required></textarea>
                </div>
    
                <div class="btn-box">
                    <button type="submit" name="submit" class="btn">Submit</button>
                </div>
            </form>
            <?php } ?>
        </section>
</body>
</html>