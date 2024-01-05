<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        Username: <input type="text" name="user"><br>
        Password: <input type="text" name="pass"><br>
        <input type="submit" name="login" value="login">
    </form>
</body>
</html>
<?php
require("users.php");
if(isset($_POST['login'])){
    extract($_POST);

    $users = New Users($user, $pass);
    if($acc = $users->login()){
        $_SESSION['nama'] = $users->login();
        $_SESSION['iduser'] = $user;
        header("location:home.php");
    }
    else{
        echo "Incorrect Username or Password!";
    }
}

?>