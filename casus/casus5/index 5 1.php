<!-- index.php -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Gastenboek</title>
</head>
<body>
    <h1>Gastenboek</h1>
    <form action="verwerk_reactie.php" method="post">
        Naam: <input type="text" name="naam" required><br>
        E-mail: <input type="email" name="email" required><br>
        Bericht: <textarea name="bericht" required></textarea><br>
        <input type="submit" value="Plaats reactie">
    </form>
    <h2>Reacties</h2>
    <?php include 'toon_reacties.php'; ?>
</body>
</html>
