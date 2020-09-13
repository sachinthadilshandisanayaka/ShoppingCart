<?php
    
    echo "Sign up database file <br>";
    
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
                            dataBaseCall($fileNewName);
                    }
                }

            }
            function dataBaseCall($profileFilePath) {
                try {
                    require 'db.inc.php';
                    $stmt = $conn->prepare("INSERT INTO userdb (username,email,password,role, profilefile) 
                    VALUES (:uname, :uemail, :upassword, :act, :pfile)");
            
                    $stmt->bindParam(':uname', $uname, PDO::PARAM_STR);
                    $stmt->bindParam(':uemail', $uemail, PDO::PARAM_STR);
                    $stmt->bindParam(':upassword', $upassword, PDO::PARAM_STR);
                    $stmt->bindParam(':act', $role, PDO::PARAM_INT);
                    $stmt->bindParam(':pfile', $profile, PDO::PARAM_STR);
            
                    $uname = $_POST['username'];
                    $uemail = $_POST['email'];
                    $upassword = md5($_POST['password']);
                    $role = 1;
                    $profile = $profileFilePath;  
                    $stmt->execute();
            
                    if ( $stmt->rowCount() == 1) {
                        echo "OK";
                    } else {
                        echo 'ERROR';
                        header("location: SignUp.inc.php?er=1?er=1");  
                    }
                    $conn = null;
                } catch(PDOException $e){
                    header("location: SignUp.inc.php?er=1?er=1"); 
            }
        }
              
           
               

?>