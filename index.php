<?php
/*
@Author Name : Onjon Shahadat Hossain
@Email : onjon_sh@yahoo.com

@Project Name : Download Folder AS zip
@Version : 1.0.1
@Release Date : 18th February, 2014
*/ 

// Errors and Warning Response Status 
error_reporting( E_ALL ); 

// Start A Session 
session_start();

// Set A Varialbe so that no one can have the access to "natasha.php"
$message = "Natasha I Love You!!!" ;
include( "natasha.php" );

// Prevent CSRF Attack 
// Set A Flag 
$fl = 0 ; 
if( isset( $_POST[ 'download_key' ] ) && isset( $_SESSION[ 'key' ] ) ) {
    if( $_POST[ 'download_key' ] == $_SESSION[ 'key' ] ) {
        $fl = 1 ; 
    }
}

// Set Key Value 
$_SESSION[ 'key' ] = rand( 10 , 1000 );
$download_key = $_SESSION[ 'key' ] ;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>ZIP DOWNLOAD</title>
    </head>
    <body>
        <h3>
            Download File 
        </h3>
        <?php 
        // Prefix 
        $prefix = "files/" ;
        
        // Declarer Files 
        $folder_name = showFolders( $prefix );
        // Get Total Folders 
        $totalFolder = sizeof( $folder_name );  
        // Check Submit or Not 
        if( $fl == 1 ) {
            // Set A Counter 
            $c = 1 ; 
            
            // Get Folder Name and Senitize 
            $folderName = mysql_real_escape_string( $_POST[ 'folder_name' ] ); 
            
            // Call Files Crawler 
            $files = showFiles( $prefix . $folderName . "/" );
            
            // Set Source and Destination 
            $source = $prefix . $folderName ;
            $destination = 'temp/' ;
            
            // Create Zip 
            $zipResult = $makeZip -> compress( $source , $destination );
            if( strlen( $zipResult ) >= 1 ) {
                
                // Encrypt File Name 
                $aa = base64_encode( getFileName( $zipResult ) );
                // Set Download URL with File Name 
                $donwloadURL = "temp/download.php?file_name=" . $aa ; 
                // Redirect for Download 
                echo "<meta HTTP-EQUIV='refresh' content='0;url=".$donwloadURL."'>";
                // Echo Message 
                echo "<font color='green'>Download Complete!!!</font>";
            }
            else {
                // Echo Error Message 
                echo "<font color='red'>A problem occur while creating the ZIP!!</font>";
            }
            
            // Display Files inside the Requested Folders 
            $total = sizeof( $files ) ;
            echo "<br/><b>" . $folderName . "</b> / <br/>";
            echo "Files found: ";
            for( $j = 0 ; $j < $total ; $j++ ) {
                // Echo File Names inside the Requested Directory
                echo "<b>" . $c++ . ".</b> " . $files[ $j ] ;
                // Sepatate File name 
                if( $total - 1 == $j ) {
                    // if last then stop
                    echo "." ;
                }
                else {
                    // separate by comma 
                    echo ", " ;
                }
                if( $c % 5 == 0 ) {
                    echo "<br/>";
                }
            }
            
        }   
        ?>
        <form action='index.php' method="POST" >
            Select Folder Name : 
            <input type="hidden" name="download_key" value="<?=$download_key;?>" />
            <select name="folder_name" >
                <?php
                for( $i = 0 ; $i < $totalFolder ; $i++ ) {
                ?>
                    <option value="<?=$folder_name[ $i ];?>"><?=$folder_name[ $i ];?></option>
                <?php
                }
                ?>
            </select>
            <input type="submit" name="get_files" value="download" />
        </form>
    </body>
</html>
