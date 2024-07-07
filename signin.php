<body>
   <?php 
     include_once("templates/header.php");
     include_once("templates/nav.php");

    // Connection to the database
    require_once("includes/db_connect.php");

    if (isset($_POST["Submit"])) {
        $email = $_POST["email_address"];
        $password = $_POST["password"];

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Invalid email format";
        } else {
            // Prepare SQL statement using placeholders
            $query = "SELECT password FROM signin WHERE email = ?";
            $stmt = $conn->prepare($query);

            if ($stmt) {
                // Bind parameters
                $stmt->bind_param("s", $email);

                // Execute statement
                $stmt->execute();
                $stmt->bind_result($hashed_password);
                $stmt->fetch();

                if (password_verify($password, $hashed_password)) {
                    echo "Signin successful";
                    // Here you can start a session or redirect the user to a different page
                } else {
                    echo "Invalid email or password";
                }

                $stmt->close();
            } else {
                echo "Prepare failed: " . $conn->error;
            }
        }

        $conn->close();
    }
    ?>

    <header>
        <div class="header">
            <h1>Welcome Back</h1>
        </div>
    </header>

    <div class="form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="signin">
            <label for="Eaddress">Email Address:</label><br>
            <input type="email" id="Eaddress" name="email_address" placeholder="Enter your Email Address" required><br><br>
            <label for="Password">Password:</label><br>
            <input type="password" id="Password" name="password" placeholder="Enter Password" required><br><br>
            <input type="submit" name="Submit" value="Sign In">
        </form>
    </div>

    <?php include_once("templates/footer.php"); ?>
</body>
</html>
