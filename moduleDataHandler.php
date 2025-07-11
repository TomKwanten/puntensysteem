<?php
//moduleDataHandler.php
require_once "module.php";

class ModuleDataHandler
{
    private ?PDO $dbh = null;

    public function getModulesList(): array
    {
        $this->connect();
        $stmt = $this->dbh->prepare(
            "select punten_max100, moduleId, persoonId from punten;"
        );
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->disconnect();

        $result = [];
        foreach ($data as $row) {
            $result[] = Module::create(
            (int)$row['moduleId'],
            (int)$row['persoonId'],
            (int)$row['punten_max100']
        );
        }

        return $result;
    }

    public function addModulePunt(Module $module): void
    {
        $this->connect();

        // 1. Check of er al een record is met dezelfde moduleId en persoonId
        $stmt = $this->dbh->prepare(
            "SELECT COUNT(*) FROM punten WHERE moduleId = :moduleId AND persoonId = :persoonId"
        );
        $stmt->execute([
            ':moduleId' => $module->getModuleId(),
            ':persoonId' => $module->getPersoonId()
        ]);
        $exists = $stmt->fetchColumn(); 
        //fetchColumn = haalt de waarde van de 1ste kolom van het 1ste resultaat uit de uitgevoerde querey

        if ($exists) {
            // 2a. Als het record al bestaat, update het punt
            $stmt = $this->dbh->prepare(
                "UPDATE punten SET punten_max100 = :punt WHERE moduleId = :moduleId AND persoonId = :persoonId"
            );
            $stmt->execute([
                ':punt' => $module->getPunt(),
                ':moduleId' => $module->getModuleId(),
                ':persoonId' => $module->getPersoonId()
            ]);
        } else {
            // 2b. Als het record niet bestaat, voeg het toe (insert)
            $stmt = $this->dbh->prepare(
                "INSERT INTO punten (moduleId, persoonId, punten_max100) VALUES (:moduleId, :persoonId, :punt)"
            );
            $stmt->execute([
                ':moduleId' => $module->getModuleId(),
                ':persoonId' => $module->getPersoonId(),
                ':punt' => $module->getPunt()
            ]);
        }

        $this->disconnect();
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