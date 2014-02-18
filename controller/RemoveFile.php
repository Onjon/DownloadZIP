<?php
final class RemoveFile {
    // Create A Static Method 
    public static function remove( $fileParam ) {
        // Check File Exists 
        if( file_exists( $fileParam ) ) {
            // Remove The File
            unlink( $fileParam );
            echo "Okay";
        }
        else {
            echo "Not Okay ";
        }
    }
}
?>