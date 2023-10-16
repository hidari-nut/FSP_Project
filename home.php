<?php
require_once("connect.php");
?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <form action="" method="get">
        Search Title: <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
    </form>

    <form action="insertstory.php" method="get">
        <input type="submit" value="Create a new story">
    </form>

    <table>
        <tr>
            <th>title</th>
            <th>Created at</th>
            <th>Action</th>
        </tr>
    </table>
</div>

<?php

// Get user details

// $iterations = 1000;

// $sql = "INSERT INTO users (idusers, nama, password, salt) VALUES(?,?,?,?)";
// $statement = $con->prepare($sql);

// $iduser = "160421075";
// $name = "Alvin Setiawan";
// $password = "160421075";
// $salt = random_bytes(2);
// // $salt = str_shuffle("fullstackprogramming");

// $saltedpass = $password . $salt;
// $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 32);

// $statement->bind_param('ssss', $iduser, $name, $finalpass, $salt);
// $statement->execute();

// $iduser = "160421044";
// $name = "Vincent Joewono";
// $password = "160421044";
// $salt = random_bytes(2);
// // $salt = str_shuffle("fullstackprogramming");

// $saltedpass = $password . $salt;
// $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 32);

// $statement->bind_param('ssss', $iduser, $name, $finalpass, $salt);
// $statement->execute();

// $iduser = "160421069";
// $name = "Made Viswanata";
// $password = "160421069";
// $salt = random_bytes(2);
// // $salt = str_shuffle("fullstackprogramming");

// $saltedpass = $password . $salt;
// $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 32);

// $statement->bind_param('ssss', $iduser, $name, $finalpass, $salt);
// $statement->execute();

?>