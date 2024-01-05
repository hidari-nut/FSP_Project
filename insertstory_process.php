<?php
require_once("cerita.php");
session_start();

if(!$_SESSION['nama']){
    header("location:index.php");
}

if (!isset($_POST['post'])) {
    header("Location: home.php");
    exit();
} else {
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];

    $iduser = $_SESSION['iduser'];

    $story = new Cerita(null, $title, $iduser);
    $story->insertStory($paragraph);
    
    header("Location: home.php");
    exit();
}

?>