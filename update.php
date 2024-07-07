
<?php

include_once("Template/nav.php");
include_once("Template/header.php");
require_once("includes/db_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $Fullname = $_POST["Fullname"];
    $email = $_POST["email_address"];
    $subject_line = $_POST["subject_line"];
    $text_message = $_POST["message"];

    $stmt = $conn->prepare("UPDATE message SET Fullname=?, email=?, subject_line=?, message=? WHERE id=?");
    $stmt->bind_param("ssssi", $name, $email, $subject_line, $text_message,$id);
    $stmt->execute();

    $stmt->close();
    
    // Redirect to yourInfo.php after updating with success message
    header("Location: yourInfo.php?message=yourInformation%20updated%20successfully");
    exit();
} else {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM message WHERE id=$id");

    $row = $result->fetch_assoc();
?>
    <section id="capture-details">
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="Fullname">Fullname:</label>
        <input type="text" id="Fullname" name="Fullname" value="<?php echo $row['Fullname']; ?>" required>

        <label for="email">Email Address:</label>
        <input type="email" id="email_address" name="email_address" value="<?php echo $row['email_address']; ?>" required>


        <label for="sb">Select the Subject</label><br>
        <select name="subject_line" id="sb" value="<?php echo $row['date']; ?>" required>

>
            <option value="">---Select Subject---</option>
            <option value="Password Support">Password Support</option>
            <option value="Mpesa Support">Mpesa Support</option>
            <option value="FAQs Support">FAQs Support</option>
            <option value="Other">Other</option>
        </select><br><br>
        <label for="ms">More Information:</label><br><br>
        <textarea cols="50" rows="9" name="message" placeholder="More Information"<?php echo $row['additional_details']; ?></textarea>
    
        <button type="submit">Update</button>
    </form>
    </section>
<?php
}

// Close connection
$conn->close();
?>

<?php include_once("Template/footer.php"); ?>
