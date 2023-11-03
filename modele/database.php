<?php


// Connexion à la base de données 

class Databaseconnexion {

    private $host;
    private $dbname;
    private $username;
    private $password;
    public $mydatabase;

    public function __construct() {

        $this->host = "localhost";
        $this->dbname = "gerer_contact";
        $this->username = "root";
        $this->password = "";
        // $this->mydatabase = "PDO" ;

        try {
            $mydatabase = new PDO(
                "mysql:host=$this->host;
                dbname=$this->dbname", 
                $this->username,
                $this->password
            );
            $mydatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $mydatabase->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

            $this->mydatabase = $mydatabase;
            
            // echo '<h1> 😃 Great! Connexion à la base de donnée réussie.👏 <br> Voici les données qui viennent d\'être insérer:</h1>';
        } catch (PDOException $e) {
            echo "<h1> 😬 Sorry! Connexion à la base de donnée échouée: 🤏</h1>" . $e->getMessage();
        };
    }
}

$connect = new Databaseconnexion(); 
$ladatabase = $connect->mydatabase;

// var_dump($ladatabase); 

?>