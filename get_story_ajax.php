<?php
session_start();
require("Cerita.php");
$iduser = $_POST["iduser"];
$start = $_POST["start"];
$cerita = New Cerita(null, null, $iduser);
$result = $cerita->getStoryExcludingCurrentUser($start);
$data = "";
while($row = $result->fetch_assoc()){
    $judul = $row["judul"];
    $count = $row["count"];
    $id = $row["idcerita"];
    $nama = $row["nama"];
    $data .= 
    "<div class='card'>
    <h3>$judul</h3>
    <p>Pemilik Cerita: $nama</p>
    <p>Jumlah Paragraf: $count</p>
    <a href='readstory.php?idcerita=$id'>Baca Lebih Lanjut</a>
    </div>";
}
echo $data;

?>