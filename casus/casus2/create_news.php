<?php
require_once 'news.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_id = $_POST['category_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    if (addNews($category_id, $title, $content)) {
        echo "Nieuwsbericht succesvol toegevoegd.";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van het nieuwsbericht.";
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws toevoegen</title>
</head>
<body>
    <h2>Plaats nieuw nieuwsbericht</h2>
    <form action="create_news.php" method="post">
        <label for="category_id">Categorie:</label>
        <select name="category_id" id="category_id">
            <?php
            $categories = getCategories();
            foreach ($categories as $category) {
                echo "<option value=\"" . $category['id'] . "\">" . $category['name'] . "</option>";
            }
            ?>
        </select><br>
        Titel: <input type="text" name="title" required><br>
        Inhoud: <textarea name="content" required></textarea><br>
        <input type="submit" value="Plaats nieuwsbericht">
    </form>
</body>
</html>
 