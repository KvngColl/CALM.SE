<?php
// Initialize the session
session_start();


// Include config file
require_once "includes/connection.php";


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $new_password = mysqli_real_escape_string($conn, $new_password);


    $sql =  "SELECT * from clientele WHERE client_email = '$email'";

    $results = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($results);


    if (isset($row['password'])) {

        $password = $row['password'];

        // Check input errors before updating the database
        if ( $row['email'] == $email ) {

            //hash new password
            $new_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Prepare an update statement
            $sql = "UPDATE clientele SET client_password = '$new_password' WHERE client_email = '$email'";

            $updatePass = mysqli_query($conn, $sql);

            if ($updatePass) {
                header('Location: login.php?updatedpassword');
            } else {
                header('Location: reset_password.php?error=resetfailed');
            }

            // Close statement
            $stmt->close();
        } else{
            header('Location: reset_password.php?error=resetfailed');
        }
    } else {
        header('Location: reset_password.php?error=resetfailed');
    }

    // Close connection
    $conn->close();
}
?>
