<?php

//-------------------------------------------------------------------connect-to-user-data-base------------------------------------------------------------------------------------------

require("connection.php");

$stmt2 = $conn->prepare("SELECT * FROM api_user WHERE apiid = :apiid");
$stmt2->bindParam(":apiid", $_GET["aid"]);
$stmt2->execute();
$count = $stmt2->rowCount();
$row2 = $stmt2->fetch();

    if ($count == 1) {
        $stmt = $conn->prepare("SELECT * FROM user_data WHERE sid = :sid");
        $stmt->bindParam(":sid", $_GET["sid"]);
        $stmt->execute();
        $count = $stmt->rowCount();
        $row = $stmt->fetch();
        if ($count == 1) {

            $db_username = $row["username"];
            $db_firstname = $row["firstname"];
            $db_lastname = $row["lastname"];
            $db_age = $row["age"];
            $db_verify = $row["verify"];
            $db_banned = $row["banned"];
            $db_avatar = $row["avatar"];
            $db_roles = $row["roles"];
            $db_level = $row["level"];


            if (!isset($_GET["gm"])) {
                echo $db_username . "<br>";
                echo $db_firstname . "<br>";
                echo $db_lastname . "<br>";
                echo $db_age . "<br>";
                echo $db_verify . "<br>";
                echo $db_banned . "<br>";
                echo $db_avatar . "<br>";
                echo $db_roles . "<br>";
                echo $db_level . "<br>";
//all

            } elseif ($_GET["gm"] == "fullname") {
                echo $db_firstname . $db_lastname;

            } elseif ($_GET["gm"] == "fistname") {
                echo $db_firstname;

            } elseif ($_GET["gm"] == "lastname") {
                echo $db_lastname;

            } elseif ($_GET["gm"] == "age") {
                echo $db_age;
//707intern
            } elseif ($_GET["gm"] == "verify") {
                echo $db_verify;

            } elseif ($_GET["gm"] == "banned") {
                echo $db_banned;

            } elseif ($_GET["gm"] == "roles") {
                echo $db_roles;

            } elseif ($_GET["gm"] == "level") {
                echo $db_level;
//open
            } elseif ($_GET["gm"] == "username") {
                echo $db_username;

            } elseif ($_GET["gm"] == "avatar") {
                $html = "<img src='uploads/$db_avatar'>";
                echo $html;
            }
        }
    }
?>

<style>
    body{
     margin: 0;
    }
</style>
