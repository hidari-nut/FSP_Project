<?php
require_once("connect.php");
session_start();
?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <h3>Create a Story</h3>
    <form action="insertstory_process.php" method="post">
        <label for="title">Title</label><br>
        <input type="text" id="title" name="title"><br>

        <label for="paragraph">First Paragraph</label><br>
        <textarea id="paragraph" name="paragraph" cols="30" rows="10"></textarea>

        <br><br>
        <input type="submit" id="post" name="post" value="Post">
    </form>

    <form action="home.php" method="post">
        <input type="submit" name="back" value="Back">
    </form>

</div>