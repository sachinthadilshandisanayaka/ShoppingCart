<?php
    // require 'db.php';
    echo "Sign up database file <br>";
    $uname = $_POST['username'];
            $file = $_FILES['file'];
            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
            $allow = array('jpg', 'jpeg', 'png');

           
            if( in_array( $fileActualExt, $allow ) ) {
                
                
                if ($fileError == 0 ) {
                   
                    if ( $fileSize < 10097152) {
                    
                        $fileNewName = uniqid('', true).".".$fileActualExt;
                       
                            $fileDestination = "uploads/".$fileNewName;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            echo 'Upload is Success';
                    }
                }

            }

?>