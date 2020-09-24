<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/SignUp.css">
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
        
    <!-- <form action="SignDataBaseConnection/SignUpDataBase.inc.php" method="POST" enctype="multipart/form-data" class="form-1">
    <h2>Sign Up</h2>
        <label for="Picture">Profile&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><input type="file" name="file" id="ProfilePicture" accept="image/*"><br><br>
        <label for="username">User Name
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </label> <input type="text" name="username" placeholder="user Name" required="true"> <br><br>
        <label for="email">Email&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    </label> <input type="email" name="email" placeholder="email"> <br><br>
        <?php
        if ( isset($_REQUEST['er2']) ) {
            if ($_REQUEST['er2'] == 1 ) {
                echo "<b>Email is already used!</b><br><br>";
            }
        }
        ?>
        <label for="password">Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

        </label> <input type="password" name="password" placeholder="password"> <br><br>
        <label for="password">Conform Password</label> <input type="password" name="conformPassword" placeholder="conform password"> <br><br>
       
       <?php
        if ( isset($_REQUEST['er3']) ) {
            if ($_REQUEST['er3'] == 3 ) {
                echo "<b>Conform password is incorrect !</b><br><br>";
            }
        }
        ?>
        
        <input type="radio" name="role" id="" value="Adminiter" required="true">
        <label for="Administer">Administer</label><br><br>
        <input type="radio" name="role" id="" value="Customer" required="true">
        <label for="Customer">Customer&nbsp;&nbsp;</label><br><br>
        <input type="radio" name="role" id="" value="saller" required="true">
        <label for="Saller" >Saller&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label><br><br>
      
        <button type="submit" value="submit" class="button1">Sign Up</button>
    </form> -->

    <!-- ------------ -->

    <form action="SignDataBaseConnection/SignUpDataBase.inc.php" method="POST" enctype="multipart/form-data" 
    style="max-width:500px;margin:auto" class="form-1">
        <h2>Register Form</h2>

        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input type="file" name="file" id="ProfilePicture" accept="image/*" style="padding: 10px;">

        </div>
        <div class="input-container">
            <i class="fa fa-user icon"></i>
            <input class="input-field" type="text" placeholder="username" name="usrnm" required>
        </div>

        <div class="input-container">
            <i class="fa fa-envelope icon"></i>
            <input class="input-field" type="text" placeholder="email" name="email" required>
        </div>

        <?php
        if ( isset($_REQUEST['er2']) ) {
            if ($_REQUEST['er2'] == 1 ) {
                echo "<b>Email is already used!</b><br><br>";
            }
        }
        ?>
        
        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Password" name="password" required>
        </div>

        <div class="input-container">
            <i class="fa fa-key icon"></i>
            <input class="input-field" type="password" placeholder="Conform Password" name="conformPassword" required>
        </div>

        <?php
        if ( isset($_REQUEST['er3']) ) {
            if ($_REQUEST['er3'] == 3 ) {
                echo "<b>Conform password is incorrect !</b><br><br>";
            }
        }
        ?>

        <div class="input-container">

        <input type="radio" name="role" id="" value="Adminiter" required="true">
        <label for="Administer">Administer</label>
        <input type="radio" name="role" id="" value="Customer" required="true">
        <label for="Customer">Customer&nbsp;&nbsp;</label>
        <input type="radio" name="role" id="" value="saller" required="true">
        <label for="Saller" >Saller&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
        </div>

        <button type="submit" class="btn">Register</button>
    </form>
 
</body>
</html>