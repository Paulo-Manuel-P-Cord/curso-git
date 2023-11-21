<?php 
require("../database/db.php");
session_start();
//session_destroy();
$login = $_POST["login"];
$senha = $_POST["senha"];


$query = "SELECT * FROM usuarios WHERE login = :login AND senha = :senha";
$stmt = $conn->prepare($query);
$stmt->bindParam(":login",$login);
$stmt->bindParam(":senha",$senha);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result);


if ($result) {
    $_SESSION["user"] = $login;
    // $_SESSION["usersenha"] = $senha;
    header("Location: ../index.php");
} else {
    
    header("Location: loginform2.php");
    
}




         