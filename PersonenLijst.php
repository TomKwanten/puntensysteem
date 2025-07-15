<?php
//PersonenLijst.php
require_once 'Persoon.php';

// Connectie naar database om lijst van personen op te halen

class PersonenLijst {

    public function getAllePersonen() {

        $this->connect();
        $sql = "SELECT * from personen";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $allePersonenResultLijst = array(); // de array mag niet leeg zijn
        foreach ($resultSet as $allePersonenResult) {
            $persoon = new Persoon($allePersonenResult["id"], $allePersonenResult["familienaam"], 
                $allePersonenResult["voornaam"], $allePersonenResult["geboortedatum"], 
                $allePersonenResult["geslacht"]);
            array_push($allePersonenResultLijst, $persoon);
        }
        $this->disconnect();

        return $alleModulesResultLijst;
        
    } 

    private function connect()
    {
        $this->dbh = new PDO(
            "mysql:host=localhost;port=3307;dbname=cursusphp;charset=utf8",
            "root",
            ''
        );
    }

    private function disconnect()
    {
        $this->dbh = null;
    }
}