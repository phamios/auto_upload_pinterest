<?php

require __DIR__ . '/vendor/autoload.php';

use seregazhuk\PinterestBot\Factories\PinterestBot;

$blogUrl = 'https://linhcorner.com ';
$keywords = ['beauty', 'cosmetic', 'skincare', 'Moisturising', 'lipstick'];


$bot = PinterestBot::create();
$bot->auth->login('rosscindynana@gmail.com', '1q2w3e4r!@#');

if ($bot->user->isBanned()) {
    echo "Account has been banned!\n";
    die();
}

$peopleToFollow = $bot->pinners->followers('linhcornercosmetic')->toArray();

 

foreach ($peopleToFollow as $user) {
    $bot->pinners->follow($user['id']);
}