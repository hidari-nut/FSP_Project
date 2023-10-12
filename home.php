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
        <tr><th>title</th><th>Created at</th><th>Action</th></tr>
    </table>
</div>