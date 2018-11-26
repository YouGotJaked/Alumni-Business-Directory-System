<?php
include "../src/business.php";

$test_business_id = 36;

$business = new Business();
$json = '{
    "name":"Hello",
    "status":"Darkness",
    "description":"My",
    "category":"Old",
    "street":"Friend",
    "city":"Hello",
    "state":"World",
    "zip":22222,
    "country":"!",
    "owner_id":0
}';
    
$add_resp = $business->add($json);
    
if ($add_resp) {
    echo "Business has been added" . "<br>";
} else {
    echo "Failed to add business". "<br>";
}
    
echo $business->get_one("id", $test_business_id) . "<br>";
$update_resp = $business->update($test_business_id, "name", "HELLO");
    
if ($update_resp) {
    echo "Business has been updated" . "<br>";
} else {
    echo "Failed to update business" . "<br>";
}

echo $business->get_one("id", $test_business_id) . "<br>";
    
$new_json = '{
    "name":"THIS IS UPDATED",
    "status":"DarknessWEW",
    "description":"MyWEW",
    "category":"Old",
    "street":"FriendWEW",
    "city":"Hello",
    "state":"WorldWEW",
    "zip":33333,
    "country":"NO",
    "owner_id":1
}';

$update_all_values_resp = $business->update_all_values($test_business_id, $new_json);

if ($update_all_values_resp) {
    echo "Business has been updated" . "<br>";
} else {
    echo "Failed to update business" . "<br>";
}

echo $business->get_one("id", $test_business_id) . "<br>";
$remove_resp = $business->remove($test_business_id);
    
if ($remove_resp) {
    echo "Business has been removed" . "<br>";
} else {
    echo "Failed to remove business" . "<br>";
}
?>
