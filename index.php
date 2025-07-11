<?php
//index.php
declare(strict_types = 1);
error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once 'moduleDataHandler.php';
$mdh = new ModuleDataHandler();
$modules = $mdh->getModulesList();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Punten ingeven</title>
</head>
<body>
    <div class="grid">
        <div>
            <a href="moduleToevoegen.php">Punten ingeven</a>
        </div>
        <br>
        <?php if (empty($modules)): ?>
            <p>Geen modules gevonden...</p>
        <?php else: ?> 
            <table>
                <thead>
                <tr>
                    <th>ModuleId</th>
                    <th>PersoonId</th>
                    <th>Punt</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($modules as $module): ?>
                    <tr>
                        <td>
                            <?= $module->getModuleId(); ?>
                        </td>
                        <td>
                            <?= $module->getPersoonId(); ?>
                        </td>
                        <td>
                            <?= $module->getPunt(); ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
    
</body>
</html>