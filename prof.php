<?php
session_start();
include 'conecti.php';

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Get the logged-in user's credentials from the session
$username = $_SESSION['username'];

// Check if the form for modifying the password is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the current password field is filled
    if (isset($_POST['currentPassword']) && !empty($_POST['currentPassword'])) {
        // Retrieve the current password from the form
        $currentPassword = $_POST['currentPassword'];
        
        // Query to check if the current password matches the one in the database
        $query = "SELECT * FROM user WHERE nom = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $currentPassword);
        $stmt->execute();
        
        // Check if the current password is correct
        if ($stmt->rowCount() > 0) {
            // Check if the new password field is filled
            if (isset($_POST['newPassword']) && !empty($_POST['newPassword'])) {
                // Retrieve the new password from the form
                $newPassword = $_POST['newPassword'];
                
                // Update the password in the database
                $updateQuery = "UPDATE user SET password = :newPassword WHERE nom = :username";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bindParam(':newPassword', $newPassword);
                $updateStmt->bindParam(':username', $username);
                $updateStmt->execute();
                
                echo "<script>alert('Password updated successfully.');</script>";
            } else {
                echo "<script>alert('Please enter a new password.');</script>";
            }
        } else {
            echo "<script>alert('Incorrect current password.');</script>";
        }
    } else {
        echo "<script>alert('Please enter your current password.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="profile.css">
</head>
<body>
<div class="container">    
    <h1>Welcome, <?php echo $username; ?>!</h1>
     
    <form method="post" action="">
        <label for="currentPassword">Current Password:</label>
        <input type="password" id="currentPassword" name="currentPassword" required><br><br>
        
        <label for="newPassword">New Password:</label>
        <input type="password" id="newPassword" name="newPassword" required><br><br>
        
        <button type="submit">Change Password</button>
    </form>
    
    <a href="logout.php"><button>Logout</button></a>
</div>
</body>
</html>
