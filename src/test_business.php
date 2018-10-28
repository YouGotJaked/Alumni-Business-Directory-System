<?php

include "business.php";

$business = new Business();

$json = '{
    "id":0,
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

echo $business->get(0) . "<br>";

$update_resp = $business->update(0, "name", "HELLO");

if ($update_resp) {
    echo "Business has been updated" . "<br>";
} else {
    echo "Failed to update business" . "<br>";
}

echo $business->get(0) . "<br>";

$remove_resp = $business->remove(0);

if ($remove_resp) {
    echo "Business has been removed" . "<br>";
} else {
    echo "Failed to remove business" . "<br>";
}

?>