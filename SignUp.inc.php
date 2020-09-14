<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if ( isset($_REQUEST['er']) ) {
            if ($_REQUEST['er'] == 1 ) {
                echo "Email / Password is incorrect";
            }
        }
    ?>
    <form action="Logging.inc.php" class="navigate-logging" method="POST">
        <button type="submit">Log In</button>
    </form>
        <h2>Sign Up</h2>
    <form action="SignDataBaseConnection/SignUpDataBase.inc.php" method="POST" enctype="multipart/form-data">

        <label for="Picture">Profile</label><input type="file" name="file" id="ProfilePicture" accept="image/*"><br><br>
        <label for="username">User Name</label> <input type="text" name="username" placeholder="User Name" required="true"> <br><br>
        <label for="email">Email</label> <input type="email" name="email" placeholder="User Name"> <br><br>
        <?php
        if ( isset($_REQUEST['er2']) ) {
            if ($_REQUEST['er2'] == 1 ) {
                echo "<b>Email is already used!</b><br><br>";
            }
        }
        ?>
        <label for="password">Password</label> <input type="password" name="password" placeholder="password"> <br><br>

            <input type="radio" name="role" id="" value="Adminiter" required="true">
            <label for="Administer">Administer</label><br><br>
            <input type="radio" name="role" id="" value="Customer" required="true">
            <label for="Customer">Customer</label><br><br>
            <input type="radio" name="role" id="" value="saller" required="true">
            <label for="Saller" >Saller</label><br><br>
      
        <input type="submit" value="submit">
    </form>
 
</body>
</html>