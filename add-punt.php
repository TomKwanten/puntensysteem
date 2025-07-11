<?php
// add-punt.php
declare(strict_types = 1);

require_once 'module.php';
require_once 'moduleDataHandler.php';

if (
    isset($_POST['moduleId'], $_POST['persoonId'], $_POST['punt']) &&
    !empty($_POST['moduleId']) &&
    !empty($_POST['persoonId']) &&
    !empty($_POST['punt'])
) {
    $moduleId = (int) $_POST['moduleId'];
    $persoonId = (int) $_POST['persoonId'];
    $punt = (int) $_POST['punt'];

    $mdh = new ModuleDataHandler();
    $bestaandeModules = $mdh->getModulesList();

    $bestaatAl = false;
    foreach ($bestaandeModules as $bestaande) {
        if (
            $bestaande->getModuleId() === $moduleId &&
            $bestaande->getPersoonId() === $persoonId
        ) {
            $bestaatAl = true;
            break;
        }
    }

    if (!$bestaatAl) {
        $nieuwModulePunt = Module::create($moduleId, $persoonId, $punt);
        $mdh->addModulePunt($nieuwModulePunt);
    } else {
        // Toon fout via GET
        header('location: moduleToevoegen.php?error=1');
        exit;
    }
}

header('location: index.php');
exit;
