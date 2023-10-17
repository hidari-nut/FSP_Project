<?php
require_once("connect.php");
session_start();

if (!isset($_POST['post'])) {
    header("Location: home.php");
    exit();
} else {
    $idcerita = $_POST['idcerita'];
    $paragraph = $_POST['paragraph'];

    $iduser = $_SESSION['iduser'];

    $sql = "INSERT INTO paragraf (isi_paragraf, idcerita, idusers) VALUES(?,?,?)";
    $statement = $con->prepare($sql);

    $statement->bind_param('sis', $paragraph, $idcerita, $iduser);
    $statement->execute();

    echo "<form action='readstory.php' method='get' id='form-return-story'>";
    echo "<input type='hidden' id='idcerita' name='idcerita' value='$idcerita'>";
    echo "</form>";

    echo "<script type='text/javascript'>";
    echo "document.getElementById('form-return-story').submit();";
    echo "</script>";
}

?>