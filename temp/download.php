<?php
/*
@Author Name : Onjon Shahadat Hossain
@Email : onjon_sh@yahoo.com

@Project Name : Download Folder AS zip
@Version : 1.0.1
@Release Date : 18th February, 2014
*/ 

if( !isset( $_GET[ 'file_name' ] ) ) {
    exit();
}
if( empty( $_GET[ 'file_name' ] ) ) {
    exit();
}

$fileParam = base64_decode( $_GET[ 'file_name' ] );
// Check File Exists 
if( file_exists( $fileParam ) ) {
// Start Download 
    header('Cache-Control: public' );
    header('Content-Description: File Transfer' );
    header('Content-Type: application/force-download');
    header('Content-Type: application/zip');
    header("Content-Disposition: attachment; filename={$fileParam}" );
    header('Content-Transfer-Encoding: binary' );
    ob_clean();
    flush();
    if( readfile( $fileParam ) ) {
        // Remove temp file 
        unlink( $fileParam );
        header( "Location: ../index.php" );
        exit();
    }
    else {
        die( "Could not download the File!!!" );
    }
// End Download 
}
else {
    die( "File Doesn't Exist!!!" );
}


?>