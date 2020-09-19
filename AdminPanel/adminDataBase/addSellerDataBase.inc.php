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
                                            
                                        }

                                    } else{
                                        echo "<br>Database read error";
                                    }

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