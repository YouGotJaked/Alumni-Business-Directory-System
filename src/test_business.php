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

$business->add($json)

?>