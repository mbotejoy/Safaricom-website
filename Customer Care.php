<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service</title>
    <link rel="stylesheet"href="css/style.css">
    <style>
        h1{
            text-align: center;
        }
        
        
      
    </style>
</head>
<body>
<?php 
   
   include_once("templates/nav.php");
   require_once("includes/db_connect.php");

   if(isset($_POST["Send_message"])){
    $Fullname = $_POST["Fullname"];
    $email = $_POST["emali_address"];
    $subject_line = $_POST["subject_line"];
    $text_message = $_POST["message"];
 
   $insert_message = "INSERT INTO messages (senderName, senderAddress, subjectLine,Message)
   VALUES ('$Fullname', '$email', '$subject_line','$text_message ')";
   
   if ($conn->query($insert_message) === TRUE) {
     echo "New record created successfully";
   } else {
     echo "Error: " . $insert_message . "<br>" . $conn->error;
   }
   

   }
?>   
 

    <header>
        <div class="header">
            <h1>Customer Care Services</h1>
        </div>
        
    </header>
    <div class="content">
        <h4>
            Safaricom is for you!<br>
            For any questions, requests or complains;<br>
            Kindly fill in the form below.

        </h4>
    </div>
    <div class="form">
    <forms action="<?php print htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" class="contact_form">
        
            <label for="FN"> Fullname : </label><br>
            <input type = "text" id= "FN" name="Fullname" placeholder=" Enter Fullname" required><br><br>
            <label for="email">Email Address : </Address></label><br>
            <input type = "email" id= "email" name ="email_address" placeholder="Enter your Email Address" required><br><br>


            <label for="sb">Subject:</label><br>
            <select name="subject_line" id="sb">
                <option value="">---Select Subject-</option>
                <option value="Password Support">Password Support</option>
                <option value="Mpesa Support"> Mpesa Support</option>
                <option value="FAQs Support">FAQs Support</option>
                <option value="Other">Other</option><br><br>
            </select><br><br>
            <label for="ms">More Information :</label><br><br>
            <textarea cols="50" rows="9" name="message" id="ms"></textarea><br><br>
            <input type="submit" name = "Send_message" value="Send Message">
       

           


    </forms>
    </div>

    <?php include_once("templates/footer.php");?>
    
   
    
       
       


        
        










</body>
</html>


