<?php

class Users{
    private $username;
    private $password;
    private $con;
    public function __construct($user, $pass)
    {
        $this->username=$user;
        $this->password=$pass;
        $this->con = new mysqli("localhost", "root", "mysql", "fspdb");
        if ($this->con->connect_errno) {
            die("Failed to connect to MySQL: " . $this->con->connect_errno);
        }
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

?>