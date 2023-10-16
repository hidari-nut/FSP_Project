<?php

require_once("connect.php");

if (isset($_POST['submit'])) {
    $iduser = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE idusers=?";
    $statement = $con->prepare($sql);
    $statement->bind_param("s", $iduser);
    $statement->execute();
    $result = $statement->get_result();

    if ($userdetails = $result->fetch_assoc()) {

        $name = "";
        $salt = $userdetails['salt'];
        $actual_pass = $userdetails['password'];

        $iterations = 1000;
        $saltedpass = $password . $salt;
        $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 64);

        if ($actual_pass == $finalpass) {
            $name = $userdetails['nama'];

            echo "<form action='home.php' method='post' id='form-user-details'>";
            echo "<input type='hidden' id='iduser' name='iduser' value='$iduser'>";
            echo "<input type='hidden' id='name' name='name' value='$name'>";
            echo "</form>";

            echo "<script type='text/javascript'>";
            echo "document.getElementById('form-user-details').submit();";
            echo "</script>";
        } else {
            echo "<form action='index.php' method='post' id='form-return'>";
            echo "<input type='hidden' id='incorrect-cred' name='incorrect-cred' value='True'>";
            echo "</form>";

            echo "<script type='text/javascript'>";
            echo "document.getElementById('form-return').submit();";
            echo "</script>";
        }
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
}

?>