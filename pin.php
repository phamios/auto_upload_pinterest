<?php
require __DIR__ . '/vendor/autoload.php';

use seregazhuk\PinterestBot\Factories\PinterestBot;

$blogUrl = 'https://linhcorner.com';
$keywords = ['beauty', 'cosmetic', 'skincare', 'Moisturising', 'lipstick'];


$bot = PinterestBot::create();
$bot->auth->login('rosscindynana@gmail.com', '1q2w3e4r!@#');

if ($bot->user->isBanned()) {
    echo "Account has been banned!\n";
    die();
}

// get board id
$boards = $bot->boards->forUser('linhcornercosmetic');
$boardId = $boards[0]['id'];
$boardId = '792211459391513814';
// select image for posting
$images = glob('images/*.*');

if(empty($images)) {
    echo "No images for posting\n";
    die();
}

for($i =0; $i <= $images.count(); $i++ ){

	$image = $images[$i];
	echo $image."<br/>";
	// select keyword
	$keyword = $keywords[array_rand($keywords)];

	// create a pin
	$bot->pins->create($image, $boardId, $keyword, $blogUrl);

	// remove image
	unlink($image);
}





 