<?php
require_once 'news.php';
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Controleer of de vereiste velden zijn ingevuld
    if (isset($_POST['news_id']) && isset($_POST['name']) && isset($_POST['email']) && isset($_POST['content'])) {
        // Ontvang de gegevens van het reactieformulier
        $news_id = $_POST['news_id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $content = $_POST['content'];
 
        // Voeg de reactie toe aan de database
        $result = addComment($news_id, $name, $email, $content);
 
        if ($result) {
            echo "Reactie succesvol toegevoegd.";
        } else {
            echo "Er is een fout opgetreden bij het toevoegen van de reactie.";
        }
    } else {
        echo "Niet alle vereiste velden zijn ingevuld.";
    }
} else {
    // Toon een foutmelding als het verzoeksmethode niet POST is
    echo "Ongeldig verzoek.";
}
?>