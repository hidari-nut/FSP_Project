<?php
    require("cerita.php");
    session_start();
    if(!$_SESSION['nama']){
        header("location:index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <input type="hidden" id="user" value=<?= $_SESSION['iduser']?>>
    <div class="title">
        <h2>CERBUNG</h2>
        <p>Cerita Bersambung</p>
    </div>
    <br>

    <div class="kategori">
        Kategori: <br>
        <select name="kategori" id="kategori">
            <option value="ceritaku">Ceritaku</option>
            <option value="kumpulan">Kumpulan Cerita</option>
        </select>
    </div>

    <div class="container">
        <div class="ceritaku">
            <h2>Ceritaku</h2>
            <div class="cer-container">

            </div>
            <button id="tampilUser">Tampilkan cerita selanjutnya</button>
        </div>
        <div class="kumpulan">
            <h2>Kumpulan Cerita</h2>
            <div class="kum-container">

            </div>
            <button id="tampilKum">Tampilkan cerita selanjutnya</button>
        </div>
    </div>

    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>