<?php
include_once("templates/nav.php");
include_once("templates/header.php");
require_once("includes/db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $fullname = $_POST["Fullname"];
    $email = $_POST["email_address"];
    $subjectLine = $_POST["subject_line"]; // Assuming corrected column name
    $text_message = $_POST["message"];

    // Update query using prepared statement
    $stmt = $conn->prepare("UPDATE message SET Fullname=?, email=?, subjectLine=?, message=? WHERE message_id=?");
    $stmt->bind_param("ssssi", $fullname, $email, $subjectLine, $text_message, $id);
    
    if ($stmt->execute()) {
        // Redirect to yourInfo.php after updating with success message
        header("Location: yourInfo.php?message=Your information updated successfully");
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Fetch data to populate form fields
    $id = $_GET['id']; // Assuming you pass the id through GET parameter
    $result = $conn->query("SELECT * FROM message WHERE message_id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<section id="capture-details">
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $row['message_id']; ?>">
        
        <label for="Fullname">Fullname:</label>
        <input type="text" id="Fullname" name="Fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>" required>
        
        <label for="email_address">Email Address:</label>
        <input type="email" id="email_address" name="email_address" value="<?php echo htmlspecialchars($row['email']); ?>" required>

        <label for="subject_line">Select the Subject</label><br>
        <select name="subject_line" id="subject_line" required>
            <option value="">---Select Subject---</option>
            <option value="Password Support" <?php if ($row['subjectLine'] == "Password Support") echo "selected"; ?>>Password Support</option>
            <option value="Mpesa Support" <?php if ($row['subjectLine'] == "Mpesa Support") echo "selected"; ?>>Mpesa Support</option>
            <option value="FAQs Support" <?php if ($row['subjectLine'] == "FAQs Support") echo "selected"; ?>>FAQs Support</option>
            <option value="Other" <?php if ($row['subjectLine'] == "Other") echo "selected"; ?>>Other</option>
        </select><br><br>

        <label for="message">More Information:</label><br><br>
        <textarea cols="50" rows="9" name="message" placeholder="More Information"><?php echo htmlspecialchars($row['message']); ?></textarea><br><br>
    
        <button type="submit">Update</button>
    </form>
</section>
<?php
    } else {
        echo "No record found.";
    }
}

// Close connection
$conn->close();

include_once("templates/footer.php");
?>

