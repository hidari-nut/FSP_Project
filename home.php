<?php
require_once("connect.php");
session_start();

$perPage = 3;

// Catch page number
if (isset($_GET['page']))
    $page = $_GET['page'];
else
    $page = 1;

if (!is_numeric($page))
    $page = 1;

$start = ($page - 1) * $perPage;

// Catch sent Search keyword
if (isset($_GET['search']))
    $search = $_GET['search'];
else
    $search = '';

function getMovie($search = "%")
{
    $con = new mysqli("localhost", "root", "", "fspdb");
    $sql = "SELECT * FROM cerita
        WHERE judul LIKE ?";
    $statement = $con->prepare($sql);
    $statement->bind_param("s", $search);
    $statement->execute();
    $result = $statement->get_result();

    return $result;
}
function getMovieLimit($search = "%", $start = 0, $perPage = 3)
{
    $con = new mysqli("localhost", "root", "", "fspdb");
    $sql = "SELECT c.idcerita, c.judul, u.nama FROM cerita as c 
    INNER JOIN users as u on c.idusers = u.idusers
    WHERE judul LIKE ? LIMIT ?,?";
    $statement = $con->prepare($sql);
    $statement->bind_param("sii", $search, $start, $perPage);
    $statement->execute();
    $result = $statement->get_result();

    return $result;
}

$checkSearch = $search;
if($search = ''){
    $checkSearch = "%";
}
$result = getMovie($checkSearch);
$totalData = $result->num_rows;
$totalPage = ceil($totalData / $perPage);

?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <form action="home.php" method="get">
        Search Title: <input type="text" name="search">
        <input type="submit" name="submit" value="Search">
    </form>

    <form action="insertstory.php" method="get">
        <input type="submit" value="Create a new story">
    </form>

    <table>
        <tr>
            <th>Title</th>
            <th>Created by</th>
            <th>Action</th>
        </tr>

        <?php

        if ($search != '') {
            $search = $_GET['search'];
            $result = getMovieLimit($search, $start, $perPage);
        } else {
            $search = '%';
            $result = getMovieLimit($search, $start, $perPage);
        }

        while ($cerita = $result->fetch_assoc()) {
            $idcerita = $cerita['idcerita'];
            $title = $cerita['judul'];
            $author = $cerita['nama'];
            echo "<tr>";
            echo "<td>";
            echo $title;
            echo "</td>";

            echo "<td>";
            echo $author;
            echo "</td>";
            
            echo "<td>";
            echo "<a href='readstory.php?idcerita=$idcerita'>Lihat Cerita</a>";
            echo "</td>";
            echo "</tr>";
        }

        ?>

    </table>

    <?php
    $startpage = $page;

    if ($page > 1) {
        $startpage -= 1;
    }

    $endpage = $startpage + 3;

    if ($totalPage < ($startpage + 3)) {
        $startpage = $totalPage - 3;
        if (($totalPage - 3) < 1) {
            $startpage = 1;
        }
        $endpage = $totalPage;
    }

    for ($i = $startpage; $i < ($endpage + 1); $i++) {
        echo "<a href='home.php?page=$i&seach=$search'>$i</a>";
    }
    ?>

    <br><br>
    <form action="logout.php">
        <input type="submit" id="logout" name="logout" value="Log Out" />
    </form>
</div>

<?php

// Get user details

function random_str(
    int $length = 64,
    string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
): string {
    if ($length < 1) {
        throw new \RangeException("Length must be a positive integer");
    }
    $pieces = [];
    $max = mb_strlen($keyspace, '8bit') - 1;
    for ($i = 0; $i < $length; ++$i) {
        $pieces []= $keyspace[random_int(0, $max)];
    }
    return implode('', $pieces);
}

// $iterations = 1000;

// $sql = "INSERT INTO users (idusers, nama, password, salt) VALUES(?,?,?,?)";
// $statement = $con->prepare($sql);

// $iduser = "160421075";
// $name = "Alvin Setiawan";
// $password = "160421075";
// $salt = random_str(10);

// $saltedpass = $password . $salt;
// $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 64);

// $statement->bind_param('ssss', $iduser, $name, $finalpass, $salt);
// $statement->execute();

// $iduser = "160421044";
// $name = "Vincent Joewono";
// $password = "160421044";
// $salt = random_str(10);

// $saltedpass = $password . $salt;
// $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 64);

// $statement->bind_param('ssss', $iduser, $name, $finalpass, $salt);
// $statement->execute();

// $iduser = "160421069";
// $name = "Made Viswanata";
// $password = "160421069";
// $salt = random_str(10);

// $saltedpass = $password . $salt;
// $finalpass = hash_pbkdf2("sha256", $password, $salt, $iterations, 64);

// $statement->bind_param('ssss', $iduser, $name, $finalpass, $salt);
// $statement->execute();

?>