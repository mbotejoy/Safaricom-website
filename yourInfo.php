<?php 
include_once("templates/nav.php");
include_once("templates/header.php");
require_once("includes/db_connect.php");
?>
<header>
    <div class="header">
        <h1>User Information</h1>
    </div>
</header>
<?php

// Check for success message
if (isset($_GET['message'])) {
    echo '<p>' . htmlspecialchars($_GET['message']) . '</p>';
}

require_once("includes/db_connect.php");

// Fetch all customer care information
$stmt = "SELECT message_id, fullname, email, subjectLine, message FROM message";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Subject Line</th>
                <th>Additional Details</th>
                <th>Actions</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>{$row['subjectLine']}</td>
                <td>{$row['message']}</td>
                <td>
                    <a href='update.php?id={$row['message_id']}'>Update</a> |
                    <a href='delete.php?id={$row['message_id']}' onclick='return confirm(\"Confirm you want to delete this information\")'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch all signup information
$stmt = "SELECT id, fullname, email,password FROM signup";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Fullname</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['fullname']}</td>
                <td>{$row['email']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Update</a> |
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Confirm you want to delete this information\")'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Fetch all signin information
$stmt = "SELECT id, email, password FROM signin";
$result = $conn->query($stmt);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>Email</th>
                <th>Actions</th>
            </tr>";

    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['email']}</td>
                <td>{$row['password']}</td>
                <td>
                    <a href='update.php?id={$row['id']}'>Update</a> |
                    <a href='delete.php?id={$row['id']}' onclick='return confirm(\"Confirm you want to delete this information\")'>Delete</a>
                </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();

?>
<footer>
    <?php include_once("templates/footer.php"); ?>
</footer>
</body>
</html>


