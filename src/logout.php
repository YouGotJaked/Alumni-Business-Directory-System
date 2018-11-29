/*
 DESCRIPTION: This module provides the logout functionality. It ends the current user's session and redirects them to the login page.
 */

<?php
session_start();

// unset all session variables
$_SESSION = array();
    
// delete session cookies
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

// go to login
header('Location: ../web/login.php');
?>
