<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="SignUp.php" class="navigate-logging">
        <button type="submit">Sign up</button>
    </form>
    <form action="LogInDataBase.php" method="GET">
        <h2>Logging</h2>
        <label for="username">User Name</label> <input type="text" name="username" placeholder="User Name"> <br><br>
        <label for="email">Email</label> <input type="email" name="email" placeholder="User Name"> <br><br>
        <label for="password">Password</label> <input type="password" name="password" placeholder="User Name"> <br><br>
        <input type="submit" value="submit">
    </form>
    
</body>
</html>