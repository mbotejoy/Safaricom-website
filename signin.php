<?php include_once("templates/header.php")?>

<body>
    <?php include_once("templates/nav.php");

    //Connection to the database
    require_once("includes/db_connect.php");?>


    <header>
        <div class="header">
            <h1>Sign In</h1>
        </div>
    </header>

    <div class="form">
        <forms action="" class="form">
        
            <label for="Eaddress">Email Address : </Address></label><br>
            <input type = "text" id= "Eaddress" placeholder="Enter your Email Address"><br><br>
            <label for="Password"> Password : </label><br>
            <input type = "text" id= "FN" placeholder=" Enter Password"><br><br>


           
    
            <input type="submit" value="Sign In" >
        </forms>
    </div>


            <?php include_once("templates/footer.php");?>
</body>
</html> 
