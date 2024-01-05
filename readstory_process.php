<?php
require("cerita.php");
session_start();

if(!$_SESSION['nama']){
    header("location:index.php");
}

if (!isset($_POST['post'])) {
    header("Location: home.php");
    exit();
} else {
    $idcerita = $_POST['idcerita'];
    $paragraph = $_POST['paragraph'];

    $iduser = $_SESSION['iduser'];

    $story = new Cerita($idcerita, null, $iduser);
    $story->insertParagraph($paragraph, $idcerita, $iduser);

    echo "<form action='readstory.php' method='get' id='form-return-story'>";
    echo "<input type='hidden' id='idcerita' name='idcerita' value='$idcerita'>";
    echo "</form>";

    echo "<script type='text/javascript'>";
    echo "document.getElementById('form-return-story').submit();";
    echo "</script>";
}

?>