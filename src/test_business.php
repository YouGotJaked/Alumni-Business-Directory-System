<?php

include "business.php";

$business = new Business();

$json_0 = '{
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

$json_1 = '{
    "id":1,
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

$json_2 = '{
    "id":2,
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

$add_resp = $business->add($json_0);

if ($add_resp) {
    echo "Business has been added" . "<br>";
} else {
    echo "Failed to add business". "<br>";
}

$add_resp = $business->add($json_1);
$add_resp = $business->add($json_2);

echo $business->get_one("id", 0) . "<br>";
echo $business->get_one("category", "Old") . "<br>";
echo $business->get_all("name", "Hello") . "<br>";

$update_resp = $business->update(0, "name", "HELLO");

if ($update_resp) {
    echo "Business has been updated" . "<br>";
} else {
    echo "Failed to update business" . "<br>";
}

echo $business->get_one("id", 0) . "<br>";
echo $business->get_one("category", "Old") . "<br>";

$remove_resp = $business->remove(0);

if ($remove_resp) {
    echo "Business has been removed" . "<br>";
} else {
    echo "Failed to remove business" . "<br>";
}

?>