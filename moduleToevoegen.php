<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Punt toevoegen</title>
</head>
<body>
<h1>Punt toevoegen</h1>

<?php if (isset($_GET['error']) && $_GET['error'] == '1'): ?>
    <p style="color:red;">⚠️     Voor deze combinatie is al een punt ingegeven.</p>
<?php endif; ?>

<form action="add-punt.php" method="post">
    <input type="number" name="moduleId" placeholder="Module ID" required />
    <input type="number" name="persoonId" placeholder="Persoon ID" required />
    <input type="number" name="punt" placeholder="Punt op 100" required />
    <button type="submit">Opslaan</button>
</form>

<br>
<a href="index.php">⬅ Terug naar overzicht</a>
</body>
</html>
