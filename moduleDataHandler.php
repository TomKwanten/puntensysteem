<?php

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
                (int)$row['punten_max100'],
                (int)$row['moduleId'],
                (int)$row['persoonId']
            );
        }

        return $result;
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