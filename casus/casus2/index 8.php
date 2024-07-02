<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuwswebsite</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <header>
        <h1>Nieuwswebsite</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="view_news.php">Nieuws bekijken</a></li>
            <li><a href="tip_friend.php">Een vriend tippen</a></li>
            <li><a href="edit_news.php">Nieuws wijzigen</a></li>
            <li><a href="delete_news.php">Nieuws verwijderen</a></li>
            <li><a href="add_news.php">Nieuws toevoegen</a></li>
            <li><a href="news.php">Nieuws</a></li>
            <li><a href="login.php">inloggen</a></li>
            <!-- Voeg hier links toe naar andere pagina's of categorieën -->
        </ul>
    </nav>
    <main>
        <!-- Hier worden nieuwsberichten weergegeven -->
        <?php
        require_once 'news.php';
        $news = getNewsByCategory(1); // Voorbeeld: haal nieuwsberichten op voor categorie 1
        foreach ($news as $article) {
            echo "<article>";
            echo "<h2>" . $article['title'] . "</h2>";
            echo "<p>" . $article['content'] . "</p>";
            echo "</article>";
        }
        ?>
    </main>
    <footer>
        <p>&copy; 2024 Nieuwswebsite. Alle rechten voorbehouden.</p>
    </footer>
</body>
 
</html>