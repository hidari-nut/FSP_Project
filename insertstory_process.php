<?php

require_once("connect.php");
session_start();

if (!isset($_POST['post'])) {
    header("Location: home.php");
    exit();
} else {
    $title = $_POST['title'];
    $paragraph = $_POST['paragraph'];

    $iduser = $_SESSION['iduser'];

    $sql = "INSERT INTO cerita (judul, idusers) VALUES(?,?)";
    $statement = $con->prepare($sql);

    $statement->bind_param('ss', $title, $iduser);
    $statement->execute();

    if ($statement->error) {
        echo "Insert Error";
    } else {
        $idcerita = $statement->insert_id;

        $sql = "INSERT INTO paragraf (isi_paragraf, idcerita, idusers) VALUES(?,?,?)";
        $statement = $con->prepare($sql);
    
        $statement->bind_param('sis', $paragraph, $idcerita, $iduser);
        $statement->execute();
    }
    header("Location: home.php");
    exit();
}

?>