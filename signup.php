<body>
<?php
include_once("templates/header.php");
// link for a navigation bar
include_once("templates/nav.php");
// Connection to the database
require_once("includes/db_connect.php");

if (isset($_POST["Submit"])) {
    $Fullname = $_POST["Fullname"];
    $email = $_POST["email_address"];
    $password = $_POST["password"];
    $confirm_pass = $_POST["confirm_pass"];

    // Validate email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
    } elseif ($password !== $confirm_pass) {
        echo "Passwords do not match";
    } else {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Prepare SQL statement using placeholders
        $insert_message = "INSERT INTO signup (fullname, email, password, confirm_pass) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_message);

        if ($stmt) {
            // Bind parameters
            $stmt->bind_param("ssss", $Fullname, $email, $hashed_password, $hashed_password);

            // Execute statement
            if ($stmt->execute() === TRUE) {
                echo "Signup successful";
            } else {
                echo "Error: " . $stmt->error;
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
        <label for="FN">Fullname:</label><br>
        <input type="text" id="FN" name="Fullname" placeholder="Enter Fullname" required><br><br>
        <label for="Eaddress">Email Address:</label><br>
        <input type="text" id="Eaddress" name="email_address" placeholder="Enter your Email Address" required><br><br>
        <label for="pswrd">Set Password:</label><br>
        <input type="password" id="Password" name="password" placeholder="Set password" required><br><br>
        <label for="pswrd">Confirm Password:</label><br>
        <input type="password" id="Password" name="confirm_pass" placeholder="Confirm password" required><br><br>
        <input type="submit" name="Submit" value="Sign Up">
    </form>
</div>

<?php include_once("templates/footer.php"); ?>
</body>
</html>
