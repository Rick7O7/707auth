<?php
if (isset($_POST["submit"])) {
    require("connection.php");
    $stmt = $conn->prepare("SELECT * FROM login_acc WHERE username = :username");
    $stmt->bindParam(":username", $_POST["username"]);
    $stmt->execute();
    $count = $stmt -> rowCount();
    $sid_gen = rand(100000, 99999999);
    $sid = hash('md5', $sid_gen);

    if($count == 0){
        if($_POST["password2"] == $_POST["password"]){
            $stmt = $conn->prepare("INSERT INTO login_acc (username, email_adress, password, sid) VALUES (:user, :email, :pw, :sid)");
            $stmt->bindParam(":user", $_POST["username"]);
            $stmt->bindParam(":email", $_POST["email"]);
            $stmt->bindParam(":sid", $sid);
            $uid = $_POST['username'];
            $hash = password_hash($_POST["password"], PASSWORD_BCRYPT);
            $hashoutsalt = substr($hash, strlen("$2y$10$"));

            $stmt->bindParam(":pw", $hashoutsalt);
            $usn_err = false;
            $psw_err = false;
            $stmt->execute();

            setcookie("uid", $uid, time() + (86400 * 30));
            setcookie("sid", $sid, time() + (86400 * 30));


            header("location: profile_register.php?sid=$sid&uid=$uid");
        }else{
            $psw_err = true;
        }
    }else{
        $usn_err = true;
    }
}