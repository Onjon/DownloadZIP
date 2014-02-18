<?php
/*
@Author Name : Onjon Shahadat Hossain
@Email : onjon_sh@yahoo.com

@Project Name : Download Folder AS zip
@Version : 1.0.1
@Release Date : 18th February, 2014
*/ 


// Prevent Direct Access to This File 
if( !isset( $message ) ) {
    // Error Message 
    die( "I Really Love You Natasha!!!" );
}
if( $message != "Natasha I Love You!!!" ) {
    // Error Message 
    die( "I Really Love You Natasha!!!" );
}

/*
// Set File Name 
$id = 1 ; 
$date = date( "d-m-Y" , strtotime( "+6 Hours" ) ) ;

// Main File Name 
$fileName = "[" . $id . "@" . $date . "]" ; 
*/ 

// Include ZIP Class 
include( "controller/CreateZip.php" );
$makeZip = new CreateZip(); // Instantiate the Main ZIP class 

// Include Crawler 
include( "controller/Crawler.php" );

// Get Main File Name 
include( "controller/FileName.php" );


?>