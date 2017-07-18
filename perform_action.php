<?php
require('vendor/autoload.php'); 

use seregazhuk\PinterestBot\Factories\PinterestBot;
use DirkGroenen\Pinterest\Pinterest;

$mypinterestlogin = $_POST["id"];
$mypinterestpassword = $_POST["password"];
$actionChoice = $_POST["taskoption"];
$keywordToSearch = $_POST["keyword"];
$resultsize = $_POST["resultsize"]; 
$commentdetail = $_POST["comment"];
$followedprofile = array();

// inetializing the bot
$bot = PinterestBot::create();

if(strcmp($actionChoice,'searchandfollow') == 0){
echo "search and follow with keyword :  <b>".$keywordToSearch."</b></br></br>";
/* logging in the user */

	$result = $bot->user->login($mypinterestlogin, $mypinterestpassword,false);
	if(!$result) {
	    echo $bot->getLastError();
	    die();
	}


	
	foreach($bot->pins->search($keywordToSearch, $resultsize) as $pin) {
        $username = $pin['pinner']['username']; // user who pinned
   
        $followuser = $bot->pinners->follow($pin['pinner']['id']);  // following the user

        if(!$followuser) {
	    echo $bot->getLastError();
	    
		}

        $followedprofile[] = 'https://www.pinterest.com/'.$username;  // creating followed user list
	}

	// printing followed user profile url as link
	echo"<html><head></head><body><br><b> Profiles Followed : </b></br>";
	foreach ($followedprofile as $key => $value) {
		echo"<br> <a href='".$value."'>".$value."</a></br>";
	}
	echo"</body></html>";

	
}
if(strcmp($actionChoice,'searchandfollow') == 0){
echo "search and follow with keyword :  <b>".$keywordToSearch."</b></br></br>";
/* logging in the user */

	$result = $bot->user->login($mypinterestlogin, $mypinterestpassword,false);
	if(!$result) {
	    echo $bot->getLastError();
	    die();
	}


	
	foreach($bot->pins->search($keywordToSearch, $resultsize) as $pin) {
        $username = $pin['pinner']['username']; // user who pinned
   
        $followuser = $bot->pinners->follow($pin['pinner']['id']);  // following the user

        if(!$followuser) {
	    echo $bot->getLastError();
	    
		}

        $followedprofile[] = 'https://www.pinterest.com/'.$username;  // creating followed user list
	}

	// printing followed user profile url as link
	echo"<html><head></head><body><br><b> Profiles Followed : </b></br>";
	foreach ($followedprofile as $key => $value) {
		echo"<br> <a href='".$value."'>".$value."</a></br>";
	}
	echo"</body></html>";

	
}


// search and like

if(strcmp($actionChoice,'searchandlike') == 0){
echo "search and like with keyword :  <b>".$keywordToSearch."</b></br></br>";
/* logging in the user */

	$result = $bot->user->login($mypinterestlogin, $mypinterestpassword,false);
	if(!$result) {
	    echo $bot->getLastError();
	    die();
	}


	
	foreach($bot->pins->search($keywordToSearch, $resultsize) as $pin) {
        $username = $pin['pinner']['username']; // user who pinned
   
       
       $likedPinResult =  $bot->pins->like($pin['id']);

        if(!$likedPinResult) {
	    echo $bot->getLastError();
	    
		}

        $likedPins[] = 'https://www.pinterest.com/pin/'.$pin['id'];  // creating followed user list
	}

	// printing followed user profile url as link
	echo"<html><head></head><body><br><b> Pins Liked : </b></br>";
	foreach ($likedPins as $key => $value) {
		echo"<br> <a href='".$value."'>".$value."</a></br>";
	}
	echo"</body></html>";

	
}

// search and like

if(strcmp($actionChoice,'searchandcomment') == 0){
	$commentprofile = array();
	$commentedPin = array();

	$result = $bot->user->login($mypinterestlogin, $mypinterestpassword,false);
	if(!$result) {
	    echo $bot->getLastError();
	    die();
	}

	echo "search and comment with keyword :  <b>".$keywordToSearch."</b></br></br>";
	
	
	

		foreach($bot->pins->search($keywordToSearch, $resultsize) as $pin) {
	        $username = $pin['pinner']['username'];
	 
	        $pinid = (string)$pin['id']; // parsing and storing pinid
	       
	       // echo $pinid;
	        try {
			   $bot->pins->comment($pinid,$commentdetail);
	      
			}

			//catch exception
			catch(Exception $e) {
			  echo 'Message: ' .$e->getMessage();
			}
	        
	        $commentprofile[] = 'https://www.pinterest.com/'.$username;
	        $commentedPin[] = 'https://www.pinterest.com/pin/'.$pinid;
	}

	// printing commented profils as html link
	echo"<html><head></head><body><b> Profiles Commented : </b></br>";
	foreach ($commentprofile as $key => $value) {
		echo"<a href='".$value."'>".$value."</a></br>";
	}

// printing commented pin url 
echo "<b>Commented Pin : </b><br />";
	foreach ($commentedPin as $key => $value) {
		echo"<a href='".$value."'>".$value."</a></br>";
		
	}
	echo"</body></html>";

	
	
}





