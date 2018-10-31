<?php
    include "user.php";
    
    // create new user account
    function create_user($first_name, $last_name, $degree, $graduation_year, $email, $password, $role, $business_id) {
        // check if user already exists with that email
        $user = new User();
        $exists = $user->get_one('email', $email);
        if ($exists) {
            echo "User already exists" . "<br>";
            return;
        }
        // hash password, always 60 char
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        // DELETE $ID
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
    
    // attempt to login user with provided credentials
    function login($email, $password) {
        $user = new User();
        $json = $user->get_one('email', $email);
        $json_obj = json_decode($json);
        return password_verify($password, $json_obj[0]->hashed_password);
    }
?>
