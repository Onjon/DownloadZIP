<?php
function getFileName( $fileParam ) {
    // Set a new Variable 
    $a = "" ;
    // Reverse the File Name 
    $fileParam = strrev( $fileParam );
    // Find The String Length 
    $len = strlen( $fileParam ) ;
    // Get every index 
    for( $i = 0 ; $i < $len ; $i++ ) {
        // Check Upto File Name 
        if( $fileParam[  $i ] == "/" ) {
            break;
        }
        $a .= $fileParam[ $i ] ;
    }
    // Reverse Again 
    $mainFile = strrev( $a );
    
    // Return Actual File Name 
    return $mainFile ; 
}
?>