<?php
//ModuleLijst.php
require_once 'Module.php';

//connectie naar database om lijst modules op te halen

class ModuleLijst {

    public function getAlleModules() {

        $this->connect();
        $sql = "SELECT * from modules";
        $stmt = $this->dbh->prepare($sql);
        $stmt->execute();
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $alleModulesResultLijst = array(); // de array mag niet leeg zijn
        foreach ($resultSet as $moduleResult) {
            $module = new Module($moduleResult["id"], $moduleResult["naam"], $moduleResult["prijs"]);
            array_push($alleModulesResultLijst, $module);
        }
        //$dbh = null;
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
?>