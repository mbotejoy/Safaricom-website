<?php
include_once("templates/nav.php");
include_once("templates/header.php");
require_once("includes/db_connect.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM message WHERE message_id=?");
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $stmt->close();
        $conn->close();
        // Redirect to yourInfo.php after deletion with success message
        header("Location: yourInfo.php?message=Your information deleted successfully");
        exit();
    } else {
        echo "Error deleting record" . $conn->error;
    }
} else {
    echo "No record specified.";
}

$conn->close();
?>
