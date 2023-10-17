<?php
require_once("connect.php");
session_start();

if (!isset($_GET['idcerita'])) {
    header("Location: home.php");
    exit();
} else {
    $idcerita = $_GET['idcerita'];
    $cerita_paragraphs = [];

    $sql = "SELECT c.judul, p.isi_paragraf FROM cerita as c
    INNER JOIN paragraf as p ON c.idcerita = p.idcerita
    WHERE c.idcerita=?";
    $statement = $con->prepare($sql);
    $statement->bind_param("i", $idcerita);
    $statement->execute();
    $result = $statement->get_result();
    $title = "";
    while ($row = $result->fetch_assoc()) {
        $title = $row['judul'];
        $cerita_paragraphs[] = $row['isi_paragraf'];
    }
}

?>
<link rel="stylesheet" href="style.css">
<div class="container">
    <h3><?=$title?></h3>
    <div class="story">
        <?php
            foreach ($cerita_paragraphs as $content) {
                echo "<p>";
                echo $content;
                echo "</p>";
            }
        ?>
        <!-- Placeholders -->
        <!-- <p>Paragraph 1</p>
        <p>Paragraph 2</p> -->
    </div>

    <br>
    <form action="readstory_process.php" method="post">
        Tambah Paragraf <br>
        <textarea name="paragraph" id="paragraph" cols="30" rows="10"></textarea><br><br>
        <input type="hidden" name="idcerita" value="<?=$idcerita?>">
        <input type="submit" name="post" value="Post">
    </form>

    <form action="home.php" method="post">
        <input type="submit" name="back" value="Back">
    </form>

</div>