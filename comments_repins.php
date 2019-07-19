<?php
require __DIR__ . '/vendor/autoload.php';

use seregazhuk\PinterestBot\Factories\PinterestBot;

$blogUrl = 'https://linhcorner.com ';
$keywords = ['beauty', 'cosmetic', 'skincare', 'Moisturising', 'lipstick'];
$comments = ['Nice! let check my store https://linhcorner.com ', 'Cool! let check my store https://linhcorner.com ', 'Very beautiful! let check my store https://linhcorner.com ', 'Amazing! let check my store https://linhcorner.com '];


$bot = PinterestBot::create();
$bot->auth->login('rosscindynana@gmail.com', '1q2w3e4r!@#');

if ($bot->user->isBanned()) {
    echo "Account has been banned!\n";
    die();
}

$board = $bot->boards->info('linhcornercosmetic', 'linhs-corner-beauty');

$pins = $bot->pins->search('beautycare')->toArray();

foreach ($pins as $pin) {
    // repin to our board
    echo $pin['id'].'-'.$board['id']."<br/>";
    $bot->pins->repin($pin['id'], $board['id']);
    // write a comment
    $comment = $comments[array_rand($comments)];
    echo $comment."<br/>";
    echo "<hr><br/>";
    $bot->comments->create($pin['id'], $comment);
}