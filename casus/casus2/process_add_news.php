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
