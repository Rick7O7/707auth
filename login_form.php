<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <title>Login by 707</title>
</head>
<body>
<form action="sec_login.php" method="post">
    <div class="form">
        <br>
        <h4>Login by 707auth</h4>
        <br>
        <div class="form-floating mb-3">

            <input type="text" name="userid" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Username/Email</label>


        </div>
        <div class="form-floating mb-3">

            <input type="password" name="password" class="form-control" id="floatingInput" placeholder="name@example.com" required>
            <label for="floatingInput">Password</label>

        </div>
        <br>
        <button name="submit" class="btn btn-lg btn-primary" type="submit">Anmelden</button>
    </div>
    </div>
</form>
</body>

</html>