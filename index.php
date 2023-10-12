<?php
require_once("connect.php");
?>
<link rel="stylesheet" href="style.css">
    <div class="container">
        <h3>LOGIN</h3>
        <form action="" method="post">
            <label for="username">Username:</label><br><input type="text" name="username" id="username"><br>
            <label for="password">Password:</label><br><input type="password" name="password" id="password"><br>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
<?php
?>