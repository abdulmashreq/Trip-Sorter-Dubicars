<?php

namespace Trip;

require_once __DIR__ . '/vendor/autoload.php';

$inputJson = file_get_contents('input.json');

$inputArray = json_decode($inputJson, true);

try {
    $apiObj = new src\TripAPI($inputArray);
    
    $boardingMessages = $apiObj->getBoardingMessages();

    $param = $_REQUEST['json'] ?? null;

    if ($param == null) {
        foreach ($boardingMessages as $index => $boardingMessage) {
            echo($index + 1) . ". " . $boardingMessage . "<br/>";
        }
    } else {
        echo json_encode($boardingMessages);
    }
} catch (TripAPIException $ex) {
    echo $ex->getMessage();
}
