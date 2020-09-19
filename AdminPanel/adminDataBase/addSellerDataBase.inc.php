<?php
    require "../../SignDataBaseConnection/db.inc.php";
    echo "works";

    $SEmail = $_REQUEST['uemail'];
    
    $sql = "SELECT * FROM sellerDetails WHERE SEmail=:semail";
    $stm = $conn->prepare($sql);
    $stm->bindParam(':semail',$SEmail);
    $stm->execute();

    if ( $stm->rowCount() > 0) {
        echo "Email is already used";
    } else {
        echo "OK...";
        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array('jpg', 'jpeg', 'png');

        if( in_array($fileActualExt, $allow)) {
            if($fileError == 0) {
                if ($fileSize < 10097152) {

                    $fileNewName = uniqid('', true).".".$fileActualExt;
                    $fileDestination = "uploads/".$fileNewName;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo 'Upload is Success';

                    

                } else{
                    echo "file size is high";
                }

            } else {
                echo "Image error";
            }

        } else{
            echo "Image is not support, uploaded image type should be jpg, jpeg or png";
        }

    }

?>