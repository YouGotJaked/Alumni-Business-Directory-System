<?php
    include 'user.php';
    
    // create new account
    function create_user($id, $first_name, $last_name, $degree, $graduation_year, $email, $password, $role, $business_id) {
        // check if user already exists with that email
        // hash password
        password_hash($password, PASSWORD_DEFAULT);
        // create json object with parameters
        $json = // create_json()
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
        $json_obj = $user->get_by_email($email);
        //$json_arr = json_decode($json_obj);
        return password_verify($password, $json_obj->hashed_password);
    }
?>
