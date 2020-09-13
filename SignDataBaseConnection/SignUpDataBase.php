<?php
    require 'db.php';

    if(isset($_GET['submit'])){

        $file = $_FILES['ProfilePicture'];
        $fileName = $_FILES['ProfilePicture']['name'];
        $fileTmpName = $_FILES['ProfilePicture']['tmp_name'];
        $fileSize = $_FILES['ProfilePicture']['size'];
        $fileError = $_FILES['ProfilePicture']['error'];
        $fileType = $_FILES['ProfilePicture']['type'];

        $fileActualExt = strtolower(end(explode(".", $fileName)));
        $allow = array('jpg', 'jpeg', 'png');

        if( in_array( $fileActualExt, $allow ) ) {
            if ($fileError == 0 ) {
                if ( $file < 10097152) {
                    $fileNewName = uniqid('', true).".".$fileActualExt;
                    $fileDestination = "uploads/".$fileNewName;

                    move_uploaded_file($fileTmpName, $fileDestination);
                }
            }

        }

    }

?>