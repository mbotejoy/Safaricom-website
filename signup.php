<body>
<?php
include_once("templates/header.php");
// link for a navigation bar
include_once("templates/nav.php");
//Connection to the database
 require_once("includes/db_connect.php");


 
 if(isset($_POST["Submit"])) {
    $Fullname = $_POST["Fullname"];
    $email = $_POST["email_address"];
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirm"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } else {
        // Prepare SQL statement using placeholders
        $insert_message = "INSERT INTO message (fullname, email, subjectLine, message) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_message);

        // Bind parameters
        $stmt->bind_param("ssss", $Fullname, $email, $subject_line, $text_message);

        // Execute statement
        if ($stmt->execute()=== TRUE) {
            echo "Message sent successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

}
 ?>

     <header>
        <div class="header">
            <h1>Signup with Us Today</h1>
        </div>
    </header>

        <div class="content">
          <h4>
           <p>Don't seem to have an account?<br>
           We are excited to have you on board!<br>
           Sign Up today!</p>

           </h4>
        </div>
        <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="signup">
            
      
        
        <label for="FN"> Fullname : </label><br>
        <input type = "text" id= "FN" name="Fullname" placeholder=" Enter Fullname" required><br><br>
        <label for="Eaddress">Email Address : </Address></label><br>
        <input type = "text" id= "Eaddress" name="email_address"placeholder="Enter your Email Address" required><br><br>
        <label for="pswrd">Set Password : </Address></label><br>
        <input type = "text" id= "Password" name="password" placeholder="Set password" required><br><br>
        <label for="pswrd">Confirm Password : </Address></label><br>
        <input type = "text" id= "Password" name= "confirm" placeholder="Confirm password"required><br><br>

        <input type="submit" name = "Submit" value="Sign Up">
        

        </forms>
        </div>
        
 
     <?php include_once("templates/footer.php");?>

</body>
</html>