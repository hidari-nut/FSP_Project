<?php
require_once("connect.php");
class Users extends Connect{
    private $username;
    private $password;
    public function __construct($user, $pass)
    {
        $this->username=$user;
        $this->password=$pass;
        parent::__construct();
    }

    public function login(){
        $sql = "SELECT * FROM users WHERE idusers=?";
        $statement = $this->con->prepare($sql);
        $statement->bind_param("s", $this->username);
        $statement->execute();
        $result = $statement->get_result();

        if ($userdetails = $result->fetch_assoc()) {
            $salt = $userdetails['salt'];
            $actual_pass = $userdetails['password'];
            $iterations = 1000;
            $finalpass = hash_pbkdf2("sha256", $this->password, $salt, $iterations, 64);

            if ($actual_pass == $finalpass) {
                return $userdetails['nama'];
            }
        }
        return false;
    }

    public function __destruct()
    {
        $this->con->close();
    }
}
