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
  //Connection to the database
 require_once("includes/db_connect.php");


   
 
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
    <forms action=""method="POST" class="form">
        
            <label for="FN"> Fullname : </label><br>
            <input type = "text" id= "FN" name="Fullname" placeholder=" Enter Fullname"><br><br>
            <label for="Eaddress">Email Address : </Address></label><br>
            <input type = "text" id= "Eaddress" name ="email_address" placeholder="Enter your Email Address"><br><br>


            <label for="sb">Subject:</label><br>
            <select name="subjectLine" id="sb">
                <option value="">---Select Subject-</option>
                <option value="1">Password Support</option>
                <option value="2"> Mpesa Support</option>
                <option value="3">FAQs Support</option>
                <option value="4">Other</option><br><br>
            </select><br><br>
            <label for="ms">More Information :</label><br><br>
            <textarea cols="50" rows="9" name="message" id="ms"></textarea><br><br>
    
            <input type="submit" name = "Send_message" value="Send Message">
       

           


    </forms>
    </div>

    <?php include_once("templates/footer.php");?>
    
   
    
       
       


        
        










</body>
</html>


