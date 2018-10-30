<?php
    include "user.php";
    
    // create new account
    function create_account($id, $first_name, $last_name, $degree, $graduation_year, $email, $password, $role, $business_id) {
        // check if user already exists with that email
        // hash password, always 60 char
        password_hash($password, PASSWORD_BCRYPT);
        // create json object with parameters
        //$json = create_json()
        $user = new User();
        $add_resp = $user->add($json);
        if ($add_resp) {
            echo "User has been added" . "<br>";
        } else {
            echo "Failed to add user" . "<br>";
        }
        
    }
    
    // attempt to login user with provided credentials
    function login($email, $password) {
        $user = new User();
        //$json = $user->get_by_email($email);
        //$json_obj = json_decode($json);
        $json = $user->get(0);
        return password_verify($password, $json->hashed_password);
    }
?>
