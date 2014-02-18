<?php

// Folder Crawler
function showFolders( $dirParam ) {  

    // Check Directory 
    if( is_dir( $dirParam ) ) {  
        
        // Open the Requested Directory 
        if( $handle = opendir( $dirParam ) )  {
            
            // Set a Array Varialbe for Return the Folder Name 
            $folderName = array();
            
            // Loop Through the Folders of this Current Directory 
            while( ( $file = readdir( $handle ) ) !== false ) {  
                
                // Skip parent(..) and root(.) directory
                if( $file != "." && $file != ".." ) { 
                    
                    // Set Folder Name in into the Array 
                    $folderName[] = $file ;
                }  
            }
            
            // Close the Requested Directory 
            closedir($handle);  
            
            // Return Folder Names 
            return $folderName ; 
        }
    } 
}

// Files Crawler 
function showFiles( $dirParam ) {

    // Check Directory 
    if( is_dir( $dirParam ) ) {  
    
        // Open the Directory 
        if( $handle = opendir( $dirParam ) )  {
            
            // Set an Array 
            $fileName = array();
            
            // Loop through the directory 
            while( ( $file = readdir( $handle ) ) !== false ) {  
                
                // Skip parent(..) and root(.) directory
                if( $file != "." && $file != ".." ) { 
                
                    // Set File Name in into the Array 
                    $fileName[] = $file ;
                }  
            }
            
            // Close Directory 
            closedir($handle); 
            
            // Return the file name 
            return $fileName ; 
        }
    }
    else {
    
        // Custom Message 
        die( "Directory Not Exists!!!" );
    }    
}

?>