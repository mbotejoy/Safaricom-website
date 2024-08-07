<?php
include_once("templates/header.php");
?>

<body>
<?php 
    include_once("templates/header.php");
    include_once("templates/nav.php");
    require_once("includes/db_connect.php");

    if(isset($_POST["Send_message"])) {
        $Fullname = $_POST["Fullname"];
        $email = $_POST["email_address"];
        $subject_line = $_POST["subject_line"];
        $text_message = $_POST["message"];

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
        <h1>Customer Care Services</h1>
    </div>
</header>
<div class="content">
    <h4>
        Safaricom is for you!<br>
        For any questions, requests or complaints;<br>
        Kindly fill in the form below.
    </h4>
</div>
<div class="form">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="contact_form">
        <label for="FN">Fullname:</label><br>
        <input type="text" id="FN" name="Fullname" placeholder="Enter Fullname" required><br><br>
        <label for="email">Email Address:</label><br>
        <input type="email" id="email" name="email_address" placeholder="Enter your Email Address" required><br><br>
        <label for="sb">Subject:</label><br>
        <select name="subject_line" id="sb" required>
            <option value="">---Select Subject---</option>
            <option value="Password Support">Password Support</option>
            <option value="Mpesa Support">Mpesa Support</option>
            <option value="FAQs Support">FAQs Support</option>
            <option value="Other">Other</option>
        </select><br><br>
        <label for="ms">More Information:</label><br><br>
        <textarea cols="50" rows="9" name="message" id="ms" required></textarea><br><br>
        <input type="submit" name="Send_message" value="Send Message">
    </form>
</div>

<?php include_once("templates/footer.php"); ?>
</body>
</html>




