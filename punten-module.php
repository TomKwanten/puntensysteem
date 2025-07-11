<?php
// punten-module.php

require_once "moduleDataHandler.php";

$dataHandler = new ModuleDataHandler();

$moduleId = $_GET['moduleId'] ?? null;
$punten = [];

if ($moduleId !== null) {
    $punten = $dataHandler->getPuntenVoorModule((int)$moduleId);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Punten per module</title>
</head>
<body>
    <a href="index.php">
        <button>⬅ Terug naar startpagina</button>
    </a>
    <h1>Punten per module</h1>

    <form method="get" action="punten-module.php">
        <label for="moduleId">Kies een module ID:</label>
        <input type="number" name="moduleId" id="moduleId" required>
        <button type="submit">Bekijk punten</button>
    </form>

    <?php if ($moduleId !== null): ?>
        <h2>Punten voor module <?= htmlspecialchars($moduleId) ?></h2>

        <?php if (count($punten) > 0): ?>
            <table border="1" cellpadding="5">
                <thead>
                    <tr>
                        <th>Persoon ID</th>
                        <th>Punt</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($punten as $rij): ?>
                        <tr>
                            <td><?= htmlspecialchars($rij['persoonId']) ?></td>
                            <td><?= htmlspecialchars($rij['punten_max100']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>Geen punten gevonden voor deze module.</p>
        <?php endif; ?>
    <?php endif; ?>
</body>
</html>
