<?php
include "../src/business.php";

// This variable needs to be set to the right index before use
$test_business_id = 62;

$business = new Business();

$json = ['name' => "name",
'status' => "Requested",
'description' => "description",
'category' => "category",
'street' => "street",
'city' => "city",
'state' => "state",
'zip' => 38471,
'country' => "country",
'owner_id' => 0];

$json_obj = json_encode($json, JSON_PRETTY_PRINT);
    
$add_resp = $business->add($json_obj);
    
if ($add_resp) {
    echo "Business has been added" . "<br>";
} else {
    echo "Failed to add business". "<br>";
}
    
echo $business->get_one("id", $test_business_id) . "<br>";

$update_resp = $business->update($test_business_id, "name", "NAME");
    
if ($update_resp) {
    echo "Business has been updated" . "<br>";
} else {
    echo "Failed to update business" . "<br>";
}

echo $business->get_one("id", $test_business_id) . "<br>";
    
$new_json = '{
    "name":"name",
    "status":"status",
    "description":"description",
    "category":"category",
    "street":"street",
    "city":"city",
    "state":"state",
    "zip":11111,
    "country":"country",
    "owner_id":0
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
