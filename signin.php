<body>
   <?php 
     include_once("templates/header.php");
     include_once("templates/nav.php");

    //Connection to the database
    require_once("includes/db_connect.php");
    ?>


    <header>
        <div class="header">
            <h1>Welcome Back</h1>
        </div>
    </header>

    <div class="form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="signup">
        
            <label for="Eaddress">Email Address : </Address></label><br>
            <input type = "text" id= "Eaddress" placeholder="Enter your Email Address" required><br><br>
            <label for="Password"> Password : </label><br>
            <input type = "text" id= "FN" placeholder=" Enter Password" required><br><br>


           
    
            <input type="submit" value="Sign In" >
        </forms>
    </div>


            <?php include_once("templates/footer.php");?>
</body>
</html> 
