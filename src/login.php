<?php

/*
    DESCRIPTION: This module provides the login functionality.
*/

require_once "user.php";
    
/*
 NAME: create_user
 PARAMETERS:
    first_name (String): first name of user
    last_name (String): last name of user
    degree (String): academic degree of user (i.e. COEN, ECON, PHIL, etc.)
    graduation_year (Integer): graduation year of user
    email (String): email address of user
    password (String): plaintext password of user
    role (String): role of user in system (visitor, owner, manager)
    business_id (Int): ID of user's business in business database
 RETURNS: none
 DESCRIPTION: Creates a new user account in the 'users' database.
 NOTES: The default role for new users is visitor, and the default business ID is 0.
 */
function create_user($first_name, $last_name, $degree, $graduation_year, $email, $password, $role, $business_id) {
    $user = new User();
    $exists = $user->get_one('email', $email);  // check if user already exists with that email
    $json_arr = json_decode($exists, true);
    
    if (count($json_arr) > 0) {
        echo "User already exists" . "<br>";
        return;
    }
    
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);   // 60 char
    $json = ['first_name' => $first_name,
        'last_name' => $last_name,
        'degree' => $degree,
        'graduation_year' => $graduation_year,
        'email' => $email,
        'hashed_password' => $hashed_password,
        'role' => $role,
        'business_id' => $business_id];
        
    $json_obj = json_encode($json, JSON_PRETTY_PRINT);
    $add_resp = $user->add($json_obj);

    if ($add_resp) {
        echo "User has been added" . "<br>";
    } else {
        echo "Failed to add user" . "<br>";
    }
}
    
/*
 NAME: login
 PARAMETERS:
    email (String): email address of user
    password (String): plaintext password of user
 RETURNS: (Boolean) True if there exists a user with 'email' and password hashes match, otherwise False
 DESCRIPTION: Log into the database with provided credentials.
 */
function login($email, $password) {
    $user = new User();
    $json = $user->get_one('email', $email);
    $json_obj = json_decode($json);
    return isset($json_obj[0]) && password_verify($password, $json_obj[0]->hashed_password);
}
?>
