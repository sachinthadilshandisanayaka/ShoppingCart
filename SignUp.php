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
    <form action="Logging.php" class="navigate-logging">
        <button type="submit">Log In</button>
    </form>

    <form action="SignUpDataBase.php" method="GET">
        <h2>SignUp</h2>
        <label for="ProfilePicture">Profile</label><input type="file" name="ProfilePicture" id="" accept="image/*"><br><br>
        <label for="username">User Name</label> <input type="text" name="username" placeholder="User Name" required="true"> <br><br>
        <label for="email">Email</label> <input type="email" name="email" placeholder="User Name"> <br><br>
        <label for="password">Password</label> <input type="password" name="password" placeholder="User Name"> <br><br>
        
        <div class="role-select">
            <input type="radio" name="role" id="" value="Adminiter" required="true">
            <label for="Administer">Administer</label><br><br>
            <input type="radio" name="role" id="" value="Customer" required="true">
            <label for="Customer">Customer</label><br><br>
            <input type="radio" name="role" id="" value="saller" required="true">
            <label for="Saller">Saller</label><br><br>
        </div>

        <label for=""></label>
        <input type="submit" value="submit">
    </form>
   
</body>
</html>