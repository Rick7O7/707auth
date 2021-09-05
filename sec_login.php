<?php
if(isset($_POST["submit"])){
    $userid = $_POST["userid"];
    $pw = $_POST["password"];

    require("connection.php");

    $stmt = $conn->prepare("SELECT * FROM login_acc WHERE username = :username");
    $stmt->bindParam(":username", $userid);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count == 1) {
        $row = $stmt->fetch();
        $db_sid = $row["sid"];
        $db_pw = $row["password"];
        $db_email = $row["email_adress"];
        $pw = "$2y$10$" . $row["password"];
        if (password_verify($_POST["password"], $pw)) {
            setcookie("username", $userid, time() + (86400 * 30));
            setcookie("email", $db_email, time() + (86400 * 30));
            setcookie("sid", $db_sid, time() + (86400 * 30));
            setcookie("login", true, time() + (86400 * 30));
            $is_username = true;

            //finish
            header("Location: end.php?sid=$db_sid");
        }
    }else {
        $stmt2 = $conn->prepare("SELECT * FROM login_acc WHERE email_adress = :username");
        $stmt2->bindParam(":username", $userid);
        $stmt2->execute();
        $count2 = $stmt2->rowCount();
        if ($count2 == 1) {
            $is_username = false;
            $row2 = $stmt2->fetch();
            $db_sid = $row2["sid"];
            $db_pw = $row2["password"];
            $db_username = $row2["username"];
            $pw = "$2y$10$" . $row2["password"];
            if (password_verify($_POST["password"], $pw)) {
                setcookie("username", $db_username, time() + (86400 * 30));
                setcookie("email", $userid, time() + (86400 * 30));
                setcookie("sid", $db_sid, time() + (86400 * 30));
                setcookie("login", true, time() + (86400 * 30));

                //finish
                header("Location: end.php?sid=$db_sid");
            }
        }
    }
}

