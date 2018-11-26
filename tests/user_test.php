<?php
include "../src/user.php";
    
$test_user_id = 17;

$user = new User();
$json = '{
    "first_name":"The",
    "last_name":"Thinker",
    "degree":"philosophy",
    "graduation_year":2077,
    "email":"hello@world.com",
    "hashed_password":"$2y$10$yijNQx65Am.35DNmWt2AJeiN/Hy6aeE38LFAkc/Sqkh/fl8AlWkhG",
    "role":"Owner",
    "business_id":0
}';

echo $json . "<br>";
$add_resp = $user->add($json);
    
if ($add_resp) {
    echo "User has been added" . "<br>";
} else {
    echo "Failed to add user" . "<br>";
}
    
echo $user->get_one('id', 0) . "<br>";
echo $user->get_one("degree", "philosophy") . "<br>";
$update_resp = $user->update(0, "first_name", "THE");
    
if ($update_resp) {
    echo "User has been updated" . "<br>";
} else {
    echo "Failed to update user" . "<br>";
}

echo $user->get_one('id', 0) . "<br>";
echo $user->get_one("degree", "philosophy") . "<br>";
$remove_resp = $user->remove(0);
    
if ($remove_resp) {
    echo "User has been removed" . "<br>";
} else {
    echo "Failed to remove user" . "<br>";
}
?>
