<?php
    require_once("connect.php");
?>
<link rel="stylesheet" href="style.css">

<div class="container">
    <h3>Create a Story</h3>
    <form action="insertstory.php" method="get">
        Title <br><input type="text" name="title"><br>
        Paragraph 1 <br><textarea name="paragraph" cols="30" rows="10"></textarea>
    </form>

    <input type="submit" name="post" value="Post">
</div>