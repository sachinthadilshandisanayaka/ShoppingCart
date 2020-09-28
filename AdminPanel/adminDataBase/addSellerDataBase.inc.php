<?php
    require "../../SignDataBaseConnection/db.inc.php";
    echo "works";

    // get AdminPanel form seller details
    
    $SEmail = trim($_REQUEST['uemail']);
    $SName = trim($_REQUEST['uname']);
    $SAddress = trim($_REQUEST['uaddress']);
    $SPhone = trim($_REQUEST['telephone']);

    // GET image details

    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    $allow = array('jpg', 'jpeg', 'png');

    
    // check email is already used
    $sql = "SELECT * FROM sellerDetails WHERE SEmail=:semail";
    $stm = $conn->prepare($sql);
    $stm->bindParam(':semail',$SEmail);
    $stm->execute();

    if ( $stm->rowCount() > 0) {
        echo "Email is already used";
    } else {
        echo "OK...";
        // check image type
       
            if( in_array($fileActualExt, $allow) || $fileName == "") {
                
                    if ($fileSize < 10097152) {
    
                        $fileNewName = uniqid('', true).".".$fileActualExt;
                        $fileDestination = "uploads/".$fileNewName;
                        move_uploaded_file($fileTmpName, $fileDestination);
                        echo 'Upload is Success';
    
                        try {
                            $stm2 = $conn->prepare("INSERT INTO sellerDetails (SName,SAddress,SEmail,SPhone,SPhoto) VALUES(:sname,:saddress,
                                        :semail, :sphone, :sphoto)");
                            
                            $stm2->bindParam(':sname', $SName);
                            $stm2->bindParam(':saddress', $SAddress);
                            $stm2->bindParam(':semail', $SEmail);
                            $stm2->bindParam(':sphone', $SPhone);
                            $string = $fileNewName;
                            if ($fileName != ""){
                                $stm2->bindParam(':sphoto', $string);
                            } else {
                                $string2 = "";
                                $stm2->bindParam(':sphoto',$string2);
                            }
                            
                            $stm2->execute();
    
                            if ($stm2->rowCount() == 1 ) {
                                echo "Seller info upload success";
    
                                $PName = trim($_REQUEST['pdname']);
                                $PPrice = trim($_REQUEST['pdprice']);
                                $PDescription = trim($_REQUEST['pdDescription']);
                                $PQuantity = trim($_REQUEST['pdQuantity']);
                                
                                // Product adding..

                                if ($PName != "") {
                                    
                                    $sql2 = "SELECT SID FROM sellerDetails WHERE SEmail=:emailGetID";
                                    $stm3 = $conn->prepare($sql2);
                                    $stm3->bindParam(':emailGetID', $SEmail);
                                    $stm3->execute();

                                    if($stm3->rowCount() == 1) {
                                        
                                        // $result = $stm3->setFetchMode(PDO::FETCH_ASSOC);
                                        $result = $stm3->fetchAll();
                                        foreach($result as $row) {
                                            $SID = $row['SID'];
                                            
                                            try{
                                                $stm4 = $conn->prepare("INSERT INTO SELLERITEMS (IDescription,IPrice,IQuntity,SupID,IName) VALUES 
                                                        (:ides,:iprice,:iqun,:isid,:iname)");
                                                $stm4->bindParam(':ides', $PDescription);
                                                $stm4->bindParam(':iprice', $PPrice);
                                                $stm4->bindParam(':iqun', $PQuantity);
                                                $stm4->bindParam('isid', $SID);
                                                $stm4->bindParam(':iname', $PName);
                                                $stm4->execute();

                                                if($stm4->rowCount() == 1) {
                                                    echo "<br>Item added.............<br>";

                                                    //add item photo........................................

                                                    $file2 = $_FILES['pfile'];
                                                    $fileName2 = $_FILES['pfile']['name'];
                                                    $fileTmpName2 = $_FILES['pfile']['tmp_name'];
                                                    $fileSize2 = $_FILES['pfile']['size'];
                                                    $fileError2 = $_FILES['pfile']['error'];
                                                    $fileType2 = $_FILES['pfile']['type'];
                                                    $fileExt2 = explode('.', $fileName2);
                                                    $fileActualExt2 = strtolower(end($fileExt2));

                                                    $file3 = $_FILES['pfile2'];
                                                    $fileName3 = $_FILES['pfile2']['name'];
                                                    $fileTmpName3 = $_FILES['pfile2']['tmp_name'];
                                                    $fileSize3 = $_FILES['pfile2']['size'];
                                                    $fileError3 = $_FILES['pfile2']['error'];
                                                    $fileType3 = $_FILES['pfile2']['type'];
                                                    $fileExt3 = explode('.', $fileName2);
                                                    $fileActualExt3 = strtolower(end($fileExt2));

                                                    $file4 = $_FILES['pfile3'];
                                                    $fileName4 = $_FILES['pfile3']['name'];
                                                    $fileTmpName4 = $_FILES['pfile3']['tmp_name'];
                                                    $fileSize4 = $_FILES['pfile3']['size'];
                                                    $fileError4 = $_FILES['pfile3']['error'];
                                                    $fileType4 = $_FILES['pfile3']['type'];
                                                    $fileExt4 = explode('.', $fileName2);
                                                    $fileActualExt4 = strtolower(end($fileExt2));
                                                    $allow = array('jpg', 'jpeg', 'png');

                                                    if($fileName2 != "") {
                                                        if( in_array($fileActualExt2, $allow)) {
                                                            $fileNewName2 = uniqid('', true).".".$fileActualExt2;
                                                            $fileDestination2 = "itemUploads/".$fileNewName2;
                                                            move_uploaded_file($fileTmpName2, $fileDestination2);
                                                            echo "<br> item photo Upload is Success <br>";

                                                            $sql3 = "SELECT IID FROM selleritems";
                                                            $stm5 = $conn->prepare($sql3);
                                                            $stm5->execute();
                                                            $result2 = $stm5->fetchAll();
                                                            foreach($result2 as $row2) {
                                                                $lastID = $row2['IID'];
                                                            }
                                                            echo $lastID;
                                                            //..............
                                                            try{
                                                                $stm6 = $conn->prepare("INSERT INTO itemphoto (PID,photo) VALUES 
                                                                        (:pid,:pphoto)");
                                                                $stm6->bindParam(':pid', $lastID);
                                                                $stm6->bindParam(':pphoto', $fileNewName2);
                                                                $stm6->execute();

                                                                if($stm6->rowCount() == 1) {
                                                                    header("Location: ../AdminPanel.inc.php?itm=1");
                                                                    //item and seller added...
                                                                } else{
                                                                    echo "<br>cant added to database<br>";
                                                                }
                                                            } catch(PDOException $e){
                                                                echo $e;
                                                            }
                        
                                                            if($stm3->rowCount() == 1) {}
                                                        }
                                                    } else{
                                                        echo "<br>file name erro<br>";
                                                    }

                                                } else {
                                                    echo "not item added";
                                                }

                                            } catch(PDOException $e) {
                                                echo $e;
                                            }
                                            

                                        }

                                    } else{
                                        echo "<br>Database read error";
                                    }

                                } else{
                                    header("Location: ../AdminPanel.inc.php?sl=1"); // seller added message
                                }
                                // ......................
                            } else {
                                echo "Cant upload seller data";
                            }
    
                        } catch(PDOException $e){
                            echo "database error";
                        }
    
                    } else{
                        echo "file size is high";
                    }
    
            } else{
                echo "Image is not support, uploaded image type should be jpg, jpeg or png";
            }

    }

?>