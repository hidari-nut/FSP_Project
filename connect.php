<?php
    // $con = new mysqli("sql207.infinityfree.com", "epiz_34105185", "WKclieaJtD", "epiz_34105185_fspdb");
    class Connect{
        protected $con;
        public function __construct()
        {
            $this->con = new mysqli("localhost", "root", "mysql", "fspdb");
            if ($this->con->connect_errno) {
                die("Failed to connect to MySQL: " . $this->con->connect_errno);
            }  
        }
    }
?>