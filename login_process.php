<?php
require("users.php");
session_start();

if (isset($_POST['submit'])) {
    $iduser = $_POST['username'];
    $password = $_POST['password'];

    $users = new Users($iduser, $password);
    $name = $users->login();

    if($name){
        $_SESSION['iduser'] = $iduser;
        $_SESSION['name'] = $name;
        header("Location: home.php");

            // echo "<form action='home.php' method='post' id='form-user-details'>";
            // echo "<input type='hidden' id='iduser' name='iduser' value='$iduser'>";
            // echo "<input type='hidden' id='name' name='name' value='$name'>";
            // echo "</form>";

            // echo "<script type='text/javascript'>";
            // echo "document.getElementById('form-user-details').submit();";
            // echo "</script>";
        } else {
            echo "<form action='index.php' method='post' id='form-return'>";
            echo "<input type='hidden' id='incorrect-cred' name='incorrect-cred' value='True'>";
            echo "</form>";

            echo "<script type='text/javascript'>";
            echo "document.getElementById('form-return').submit();";
            echo "</script>";
        }
} else {
    header("Location: index.php");
    exit();
}

?>