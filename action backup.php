<?php
require('vendor/autoload.php'); 

use seregazhuk\PinterestBot\Factories\PinterestBot;
use DirkGroenen\Pinterest\Pinterest;

$mypinterestlogin = $_POST["id"];
$mypinterestpassword = $_POST["password"];
$actionChoice = $_POST["taskOption"];
$key = $_POST["keyword"];
$resultsize = $_POST["resultsize"]; 
$followedprofile = array();

// creating pintrest bot
$bot = PinterestBot::create();

if(strcmp($actionChoice,'searchandfollow') == 0){
echo "search and follow ".$key;
/* logging in the user */

	$result = $bot->user->login($mypinterestlogin, $mypinterestpassword,false);
	if(!$result) {
	    echo $bot->getLastError();
	    die();
	}
	
	foreach($bot->pins->search($key, $resultsize) as $pin) {
	//	echo '<br>pin ID is : '.$pin['id'].'</br>' ;
      //  echo '<br>piner ID is : '.$pin['pinner']['id'].'</br>' ;
        $username = $pin['pinner']['username'];
        //$userData = $bot->pinners->info($username);
       // print_r($userData);

        // uncomment to follow user
      //  $bot->pinners->follow($pin['pinner']['id']);
        $followedprofile[] = 'https://www.pinterest.com/'.$username;
	}

	// printing followed user profile url as link
	echo"<html><head></head><body><br><b> Profiles Followed : </b></br>";
	foreach ($followedprofile as $key => $value) {
		echo"<br> <a href='".$value."'>".$value."</a></br>";
	}
	echo"</body></html>";

	die();
}

if(strcmp($actionChoice,'searchandcomment') == 0){
	echo "search and comment ".$key;
	$comment = $_POST["comment"];

	



		foreach($bot->pins->search($key, $resultsize) as $pin) {
	//	echo '<br>pin ID is : '.$pin['id'].'</br>' ;
      //  echo '<br>piner ID is : '.$pin['pinner']['id'].'</br>' ;
        $username = $pin['pinner']['username'];
        //$userData = $bot->pinners->info($username);
       // print_r($userData);

        // uncomment to follow user
      //  $bot->pinners->follow($pin['pinner']['id']);

        // uncoment to post comment
        $pinid = $pin['id'];
        //$result = $bot->pins->comment($pinid, $comment);
        echo"<br>".$comment."</br>"; 
        $followedprofile[] = 'https://www.pinterest.com/'.$username;
	}

	// printing followed user profile url as link
	echo"<html><head></head><body><br><b> Profiles Commented : </b></br>";
	foreach ($followedprofile as $key => $value) {
		echo"<br> <a href='".$value."'>".$value."</a></br>";
	}
	echo"</body></html>";

	die();
	
}

die();



