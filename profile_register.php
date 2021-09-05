<?php

if(isset($_POST["submit"])){
    require("connection.php");
    $stmt = $conn->prepare("INSERT INTO login_acc (sid, username, firstname, lastname, age, verify, banned, avatar, roles, level) VALUES (:sid, :username, :fn, :ln, :age, `false`, `false`, ``,`null`,0 )");

    $stmt->bindParam(":sid", $_COOKIE["sid"]);
    $stmt->bindParam(":username", $_COOKIE["uid"]);
    $stmt->bindParam(":fn", $_POST['fn']);
    $stmt->bindParam(":ln", $_POST['ln']);
    $stmt->bindParam(":age", $_POST['age']);


}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css"
          integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Erstellen</title>
</head>
<body>
<form action="profile_register.php" method="post">
    <div class="form">
        <br>
        <h4>Register by 707</h4>
        <br>
        <div class="form-floating mb-3">
            <input type="text" name="fn" class="form-control" id="floatingInput" placeholder="Morty" required>
            <label for="floatingInput">Vorname</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="ln" class="form-control" id="floatingInput" placeholder="Smith" required>
            <label for="floatingInput">Nachname</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" name="age" class="form-control" id="floatingPassword" placeholder="14" required>
            <label for="floatingPassword">Alter</label>
        </div>
        <br>
        <button name="submit" class="btn btn-lg btn-primary" type="submit">Daten Speichern</button>
    </div>
    </div>
</form>
</body>

</html>