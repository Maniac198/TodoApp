<?php
    session_start(); // Start the session

    // Unset all session variables
    $_SESSION = array();

    // Destroy the session data on the server
    session_destroy();

    // Expire the session cookie
    setcookie(session_name(), "", time() - 3600, "/");

    echo json_encode(array("success" => true, "message" => "Logout successful!"));
?>
