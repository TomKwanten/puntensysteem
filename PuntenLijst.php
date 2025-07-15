<?php
// PuntenLijst.php

require_once 'Punt.php';

// Connectie naar database

class PuntenLijst {
    
    public function getPuntenLijstTwee(){

        // sql instructie en teruggave van een puntenlijst gebaseerd op de klasse punt
        $this->connect();
        $sql = "SELECT moduleID, persoonID, punten_max100 AS punt from punten";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $puntenlijsttwee = array();
        foreach ($resultSet as $rij) {
            $punt = new Punt( $rij["moduleID"], $rij["persoonID"], $rij["punt"]);
            array_push($puntenlijsttwee, $punt);
        }
        //$dbh = null;
        $this->disconnect();
        return $puntenlijsttwee; //array of punt
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