<?php
//Punt.php

require_once 'Persoon.php'; 
// de link leggen naar de klasse persoon om de gegevens van 
// deze persoon te kunnen ophalen en te tonen in de tabel

require_once 'Module.php';
// om de gegevens van een module te kunnen ophalen

class Punt {

    private ?int $moduleID;
    private ?int $persoonID;
    private ?int $punt;

    public function __construct(?int $moduleID, ?int $persoonID, ?int $punt) {
        $this->moduleID = $moduleID;
        $this->persoonID = $persoonID;
        $this->punt = $punt;
    }

    public function getPersoon() {
        $this->connect();
        $sql = "SELECT * FROM personen WHERE id = ".$this->persoonID;
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultSet) === 0) {
            $this->disconnect();
            return new Persoon(0, "Onbekend", "Onbekend", new DateTime(), "X");
        }

        $persoonResult = $resultSet[0];
        $geboortedatum = new DateTime($persoonResult["geboortedatum"]);
        $persoon = new Persoon(
            $persoonResult["id"],
            $persoonResult["familienaam"],
            $persoonResult["voornaam"],
            $geboortedatum,
            $persoonResult["geslacht"]
        );

        $this->disconnect();
        return $persoon;
    }

    public function getModule() {
        $this->connect();
        $sql = "SELECT * FROM modules WHERE id = " . $this->moduleID;
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultSet) === 0) {
            $this->disconnect();
            return new Module(0, "Onbekend", 0.0);
        }

        $moduleResult = $resultSet[0];
        $module = new Module(
            $moduleResult["id"],
            $moduleResult["naam"],
            $moduleResult["prijs"]
        );

        $this->disconnect();
        return $module;
    }


    public function getPunt() {
        return $this->punt;
        //waarde van een punt wordt teruggestuurd
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