<?php
    // $con = new mysqli("sql207.infinityfree.com", "epiz_34105185", "WKclieaJtD", "epiz_34105185_fspdb");
    $con = new mysqli("localhost", "root", "", "fspdb");
    if ($con->connect_errno) {
        die("Failed to connect to MySQL: " . $con->connect_errno);
    } else {
        echo "Connection Success. <br>";
    }
?>