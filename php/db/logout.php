<?php
    session_start();
    require "config.php";

    if (isset($_SESSION["cuenta_id"])){
        try{
            $conn = new PDO("mysql:host=$host:$puerto;dbname=$db", $user, $pass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = $conn->prepare("UPDATE usuarios SET auth_cookie = ? WHERE id = ?");
            $sql->execute([NULL, $_SESSION["cuenta_id"]]);
        }
        catch (PDOException $e){
            header("Location: ../../error.php?id=9");
            exit();
        }
        session_unset();
        session_destroy();
        unset($_COOKIE["auth"]);
        unset($_COOKIE["ult_act"]);
        setcookie("auth", "", 1, "/");
        setcookie("ult_act", "", 1, "/"); 
    }
    header("Location: ../../index.php");
?>
