<?php
    
    echo "Sign up database file <br>";
    $upassword =trim($_POST['password']);
    $cPassword = trim($_POST['conformPassword']);

    if (strcmp($upassword,$cPassword) == 0 ) {

        $file = $_FILES['file'];
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));
        $allow = array('jpg', 'jpeg', 'png');

        include 'db.inc.php';
        $sql="SELECT * FROM userdb WHERE email=:un ";
        $statment=$conn->prepare($sql);
        $checkMail = trim($_POST['email']);
        $statment->bindParam(':un',$checkMail);
        $statment->execute();

        if( $statment->rowCount() == 0) {
            if( in_array( $fileActualExt, $allow ) ) {
            
                if ($fileError == 0 ) {
                   
                    if ( $fileSize < 10097152) {
                    
                        $fileNewName = uniqid('', true).".".$fileActualExt;
                       
                            $fileDestination = "uploads/".$fileNewName;
                            move_uploaded_file($fileTmpName, $fileDestination);
                            echo 'Upload is Success';
                            // dataBaseCall($fileNewName);
                            try {
                                require 'db.inc.php';
                                $stmt = $conn->prepare("INSERT INTO userdb (username,email,password,role, profilefile) 
                                VALUES (:uname, :uemail, :upassword, :act, :pfile)");
                
                                $uname = trim($_POST['usrnm']);
                                $uemail = trim($_POST['email']);
                                $role = trim($_POST['role']);
                                $profile = $fileNewName;
                
                                $sql="SELECT * FROM userdb WHERE email=:un";
                                $statment=$conn->prepare($sql);
                                $statment->bindParam(':un',$uemail);
                                $statment->execute();
                
                                if ( $statment->rowCount() == 0) {
                                    $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
                                    $stmt->bindParam(':uemail', $uemail, PDO::PARAM_STR);
                                    $stmt->bindParam(':upassword', md5($upassword), PDO::PARAM_STR);
                                    $stmt->bindParam(':act', $role, PDO::PARAM_INT);
                                    $stmt->bindParam(':pfile', $profile, PDO::PARAM_STR);
                                    $stmt->execute();
                
                                    if ( $stmt->rowCount() == 1) {
                                        header("location: ../Logging.inc.php?er=2");
                                    } else {
                                        header("location: ../SignUp.inc.php?er=1");  
                                    }
                                } else {
                                    header("location: ../SignUp.inc.php?er2=1");
                                }
                        
                                $conn = null;
                            } catch(PDOException $e){
                                header("location: ../SignUp.inc.php?er=1?"); 
                        }
                    }
                }

            }
        } else {
            header("location: ../SignUp.inc.php?er2=1");  
        }
   
    //     function dataBaseCall($fileNewName) {
    //         try {
    //             require 'db.inc.php';
    //             $stmt = $conn->prepare("INSERT INTO userdb (username,email,password,role, profilefile) 
    //             VALUES (:uname, :uemail, :upassword, :act, :pfile)");

    //             $uname = trim($_POST['username']);
    //             $uemail = trim($_POST['email']);
    //             $role = 1;
    //             $profile = $fileNewName;

    //             $sql="SELECT * FROM userdb WHERE email=:un ";
    //             $statment=$conn->prepare($sql);
    //             $statment->bindParam(':un',$uemail);
    //             $statment->execute();

    //             if ( $statment->rowCount() == 0) {
    //                 $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
    //                 $stmt->bindParam(':uemail', $uemail, PDO::PARAM_STR);
    //                 $stmt->bindParam(':upassword', $upassword, PDO::PARAM_STR);
    //                 $stmt->bindParam(':act', $role, PDO::PARAM_INT);
    //                 $stmt->bindParam(':pfile', $profile, PDO::PARAM_STR);
    //                 $stmt->execute();

    //                 if ( $stmt->rowCount() == 1) {
    //                     header("location: ../Logging.inc.php");
    //                 } else {
    //                     header("location: ../SignUp.inc.php?er=1");  
    //                 }
    //             } else {
    //                 header("location: ../SignUp.inc.php?er2=1");
    //             }
        
    //             $conn = null;
    //         } catch(PDOException $e){
    //             header("location: ../SignUp.inc.php?er=1?"); 
    //     }
    // }
       
        } else {
            // echo strcmp($upassword,$cPassword);
        header("location: ../SignUp.inc.php?er3=3?");
    }        

?>