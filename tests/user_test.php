/*
 DESCRIPTION: This module provides test cases for the User class.
 */

<?php
include "../src/user.php";
    
// This variable needs to be set to the right index before use
$test_user_id = 36;

$user = new User();

$json = ['first_name' => 'first_name',
'last_name' => 'last_name',
'degree' => 'degree',
'graduation_year' => 2000,
'email' => 'email@scu.edu',
'hashed_password' => '',
'role' => 'Visitor',
'business_id' => 0];

$json_obj = json_encode($json, JSON_PRETTY_PRINT);

echo $json_obj . "<br>";

$add_resp = $user->add($json_obj);
    
if ($add_resp) {
    echo "User has been added" . "<br>";
} else {
    echo "Failed to add user" . "<br>";
}
    
echo $user->get_one('id', $test_user_id) . "<br>";

$update_resp = $user->update($test_user_id, "first_name", "First_Name");
    
if ($update_resp) {
    echo "User has been updated" . "<br>";
} else {
    echo "Failed to update user" . "<br>";
}

echo $user->get_one('id', $test_user_id) . "<br>";

$remove_resp = $user->remove($test_user_id);
    
if ($remove_resp) {
    echo "User has been removed" . "<br>";
} else {
    echo "Failed to remove user" . "<br>";
}
?>
