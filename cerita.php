<?php
class Cerita{

    private $con;
    private $idcerita;
    private $title;
    private $iduser;

    public function __construct($idcerita=null, $title=null, $iduser=null)
    {
        $this->con = new mysqli("localhost", "root", "mysql", "fspdb");
        $this->idcerita = $idcerita;
        $this->title = $title;
        $this->iduser = $iduser;
    }

    public function getStory($search = "%")
    {
        
        $sql = "SELECT * FROM cerita WHERE judul LIKE ?";
        $statement = $this->con->prepare($sql);
        $statement->bind_param("s", $search);
        $statement->execute();
        $result = $statement->get_result();

        return $result;
    }

    function getStoryLimit($search = "%", $start = 0, $perPage = 3)
    {
        $con = new mysqli("localhost", "root", "mysql", "fspdb");
        $sql = "SELECT c.idcerita, c.judul, u.nama FROM cerita as c INNER JOIN users as u on c.idusers = u.idusers WHERE judul LIKE ? order by idcerita LIMIT ?, ?";
        $statement = $con->prepare($sql);
        $statement->bind_param("sii", $search, $start, $perPage);
        $statement->execute();
        $result = $statement->get_result();

        return $result;
    }

    public function insertStory($paragraph){
        $sql = "INSERT INTO cerita (judul, idusers) VALUES(?,?)";
        $statement = $this->con->prepare($sql);

        $statement->bind_param('ss', $this->title, $this->iduser);
        $statement->execute();

        if ($statement->error) {
            echo "Insert Error";
        } else {
            $idcerita = $statement->insert_id;

            $sql = "INSERT INTO paragraf (isi_paragraf, idcerita, idusers) VALUES(?,?,?)";
            $statement = $this->con->prepare($sql);
        
            $statement->bind_param('sis', $paragraph, $idcerita, $this->iduser);
            $statement->execute();
        }
    }

    public function readStory(){
        $sql = "SELECT c.judul, p.isi_paragraf FROM cerita as c
        INNER JOIN paragraf as p ON c.idcerita = p.idcerita
        WHERE c.idcerita=?";
        $statement = $this->con->prepare($sql);
        $statement->bind_param("i", $this->idcerita);
        $statement->execute();
        return $statement->get_result();
    }

    public function insertParagraph($paragraph){
        $sql = "INSERT INTO paragraf (isi_paragraf, idcerita, idusers) VALUES(?,?,?)";
        $statement = $this->con->prepare($sql);

        $statement->bind_param('sis', $paragraph, $this->idcerita, $this->iduser);
        $statement->execute();
    }

    public function __destruct()
    {
        $this->con->close();
    }

}
