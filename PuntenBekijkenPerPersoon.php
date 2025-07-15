<?php
//PuntenBekijkenPerPersoon.php

require_once 'PuntenLijst.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Punten bekijken per persoon</title>
</head>
<body>
    <h1>Punten bekijken per persoon</h1>
    <table>
        <tr>
            <th>naam</th>
            <th>voornaam</th>
            <th>familienaam</th>
            <th>punt</th>
        </tr>

        <?php
            $pl = new PuntenLijst();
            $puntenArray = $pl->getPuntenLijstTwee();

            foreach ($puntenArray as $punt) {
                //voor elke waarde in puntenArray gebruiken als punt
                print ("<tr>");
                print ("<td>".$punt->getPersoon()->getFamilienaam()."</td>");
                // van het type punt de module en daarvan de naam opvragen
                print ("<td>".$punt->getPersoon()->getVoornaam()."</td>");
                // van het type punt en daarvan persoon, voornaam
                print ("<td>".$punt->getModule()->getNaam()."</td>");
                // van het type punt en daarvan persoon, familienaam
                print ("<td>".$punt->getPunt()."</td>");
                // $punt is van het type punt
                print ("</tr>");
            }
        ?>
    </table>
    <ul>
        <li><a href="PuntenBekijkenPerPersoon.php">Naar punten bekijken per persoon</a></li>
        <li><a href="PuntenIngeven.php">Naar punten ingeven</a></li>
        <li><a href="index.php">Naar start</a></li>
    </ul>
</body>
</html>