<?php
error_reporting(E_ERROR | E_PARSE);


if (isset($_GET["apiid"])) {
    require("connection.php");

    $stmt = $conn->prepare("SELECT * FROM api_user WHERE apiid = :apiid");
    $stmt->bindParam(":apiid", $_GET["apiid"]);
    $stmt->execute();
    $count = $stmt->rowCount();

    if ($count == 1) {
        $apiVerify = true;
        if ($_GET["met"] == "login"){
            header("location: ../login_form.php");
        }
        elseif ($_GET["met"] == "register"){
            header("location: ../register_form.html");
        }
    } else {
        $apiVerify = false;
    }
}