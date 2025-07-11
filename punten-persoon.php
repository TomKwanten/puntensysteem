<?php
// punten-persoon.php
require_once "moduleDataHandler.php";

$handler = new ModuleDataHandler();
$modules = $handler->getModulesList();

$personenData = [];

// Sorteer de data per persoon
foreach ($modules as $module) {
    $persoonId = $module->getPersoonId();
    $moduleId = $module->getModuleId();
    $punt = $module->getPunt();

    $personenData[$persoonId][] = [
        'moduleId' => $moduleId,
        'punt' => $punt
    ];
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Punten per persoon</title>
</head>
<body>

<a href="index.php">
    <button>⬅ Terug naar startpagina</button>
</a>

<h1>Punten per persoon</h1>

<?php foreach ($personenData as $persoonId => $modules): ?>
    <h2>Persoon ID: <?= $persoonId ?></h2>
    <ul>
        <?php foreach ($modules as $module): ?>
            <li>Module ID <?= $module['moduleId'] ?>: <?= $module['punt'] ?> punten</li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>

</body>
</html>
