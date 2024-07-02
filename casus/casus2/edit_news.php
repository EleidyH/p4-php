<?php
require_once 'news.php';
 
$id = null;
$newsItems = getNews(); // Fetch all news items
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = isset($_POST['id']) ? intval($_POST['id']) : null;
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $content = isset($_POST['content']) ? $_POST['content'] : '';
 
    if ($id !== null && editNews($id, $title, $content)) {
        echo "Nieuwsbericht succesvol bijgewerkt.";
    } else {
        echo "Er is een fout opgetreden bij het bijwerken van het nieuwsbericht.";
    }
} else {
    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $newsItem = getNewsById($id);
        if (!$newsItem) {
            echo "Geen nieuwsbericht gevonden met dit ID.";
        }
    } else {
        echo "Geen nieuws ID opgegeven.";
    }
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nieuws bewerken</title>
    <li><a href="index.php">Home</a></li>
            <li><a href="view_news.php">Nieuws bekijken</a></li>
            <li><a href="tip_friend.php">Een vriend tippen</a></li>
            <li><a href="edit_news.php">Nieuws wijzigen</a></li>
            <li><a href="delete_news.php">Nieuws verwijderen</a></li>
            <li><a href="add_news.php">Nieuws toevoegen</a></li>
            <li><a href="news.php">Nieuws</a></li>
</head>
<body>
    <h2>Bewerk nieuwsbericht</h2>
    <form action="edit_news.php" method="get">
 
        Kies een nieuwsbericht:
        <select name="id">
            <?php foreach ($newsItems as $news) : ?>
                <option value="<?php echo htmlspecialchars($news['id']); ?>" <?php echo ($news['id'] == $id) ? 'selected' : ''; ?>>
                    <?php echo htmlspecialchars($news['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <input type="submit" value="Selecteer nieuwsbericht">
    </form>
 
    <?php if ($id !== null && isset($newsItem)) : ?>
        <form action="edit_news.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            Titel: <input type="text" name="title" value="<?php echo htmlspecialchars($newsItem['title']); ?>" required><br>
            Inhoud: <textarea name="content" required><?php echo htmlspecialchars($newsItem['content']); ?></textarea><br>
            <input type="submit" value="Werk nieuwsbericht bij">
        </form>
    <?php endif; ?>
</body>
</html>
 