<?php
    require '../../../SignDataBaseConnection/db.inc.php';

    $PDescription = trim($_REQUEST['itemDesc']);
    $PPrice = trim($_REQUEST['itemPrice']);
    $PQuantity = trim($_REQUEST['itemQuantity']);
    $SID = trim($_REQUEST['sellerid']);
    $PName = trim($_REQUEST['itemName']);
    
    $file = $_FILES['pfile'];
    $fileName = $_FILES['pfile']['name'];
    $fileTmpName = $_FILES['pfile']['tmp_name'];
    $fileSize = $_FILES['pfile']['size'];
    $fileError = $_FILES['pfile']['error'];
    $fileType = $_FILES['pfile']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    // second image
    $file2 = $_FILES['pfile2'];
    $fileName2 = $_FILES['pfile2']['name'];
    $fileTmpName2 = $_FILES['pfile2']['tmp_name'];
    $fileSize2 = $_FILES['pfile2']['size'];
    $fileError2 = $_FILES['pfile2']['error'];
    $fileType2 = $_FILES['pfile2']['type'];
    $fileExt2 = explode('.', $fileName2);
    $fileActualExt2 = strtolower(end($fileExt2));

    // third image
    $file3 = $_FILES['pfile3'];
    $fileName3 = $_FILES['pfile3']['name'];
    $fileTmpName3 = $_FILES['pfile3']['tmp_name'];
    $fileSize3 = $_FILES['pfile3']['size'];
    $fileError3 = $_FILES['pfile3']['error'];
    $fileType3 = $_FILES['pfile3']['type'];
    $fileExt3 = explode('.', $fileName3);
    $fileActualExt3 = strtolower(end($fileExt3));

    try {
        $stm = $conn->prepare("INSERT INTO selleritems (IDescription,IPrice,IQuntity,SupID,IName) VALUES 
        (:ides,:iprice,:iqun,:isid,:iname)");
        $stm->bindParam(':ides', $PDescription);
        $stm->bindParam(':iprice', $PPrice);
        $stm->bindParam(':iqun', $PQuantity);
        $stm->bindParam('isid', $SID);
        $stm->bindParam(':iname', $PName);
        $stm->execute();

        if($stm->rowCount() == 1){
            
            if($file != ""){
                // if($fileError == 0 && $fileError2 == 0 && $fileError3 == 0){
                //     if( in_array($fileActualExt, $allow) && in_array($fileActualExt2, $allow) && in_array($fileActualExt3, $allow)) {
                        
                //         $fileNewName = uniqid('', true).".".$fileActualExt;
                //         $fileDestination = "../../adminDataBase/itemUploads/".$fileNewName;
                //         move_uploaded_file($fileTmpName, $fileDestination);

                //         $fileNewName2 = uniqid('', true).".".$fileActualExt2;
                //         $fileDestination2 = "../../adminDataBase/itemUploads/".$fileNewName2;
                //         move_uploaded_file($fileTmpName2, $fileDestination2);

                //         $fileNewName3 = uniqid('', true).".".$fileActualExt3;
                //         $fileDestination3 = "../../adminDataBase/itemUploads/".$fileNewName3;
                //         move_uploaded_file($fileTmpName3, $fileDestination3);

                //         $stm2 = $conn->prepare("SELECT IID FROM selleritems");
                //         $stm2->execute();
                //         $result = $stm2->fetchAll();

                //         foreach($result as $row) {
                //             $lastId = $row['IID'];
                //         }
                //         try {
                //             $stm3 = $conn->prepare("INSERT INTO itemphoto (PID,photo) VALUES (:pid,:pphoto1), (:pid,:pphoto2), (:pid,:pphoto3)");
                //             $stm3->bindParam(':pid', $lastId);
                //             $stm3->bindParam(':pphoto', $fileNewName);
                //             $stm3->bindParam(':pphoto2', $fileNewName2);
                //             $stm3->bindParam(':pphoto3', $fileNewName3);
                //             $stm3->execute();

                //             echo $stm3->rowCount();

                //         } catch(PDOException $e){
                //             echo $e;
                //         }

                //     } else{
                //         header("Location: ../AddItems.inc.php?er2=1");
                //     }
                // } else{
                //     header("Location: ../AddItems.inc.php?er2=1");
                // }

            } else{
                header("Location: ../AddItems.inc.php?er2=1");
            }


            // header("Location: ../AddItems.inc.php?er=1");
        }

    } catch(PDOException $e){
        echo $e;
    }
?>