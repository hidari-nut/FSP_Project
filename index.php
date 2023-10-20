<?php
session_start();
?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h3>LOGIN</h3>
    <form action="login_process.php" method="post">
        <label for="username">Username:</label><br><input type="text" name="username" id="username"><br>
        <label for="password">Password:</label><br><input type="password" name="password" id="password"><br>
        <input type="submit" name="submit" value="Login">
    </form>
</div>
<?php

if(isset($_POST['incorrect-cred'])){
    if($_POST['incorrect-cred'] == 'True'){
        echo "Incorrect Username or Password!";
    }
}

?>