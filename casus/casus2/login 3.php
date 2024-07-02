<?php
session_start();
 
// Database configuratie
$host = 'localhost'; // Je hostnaam
$dbname = 'news_db'; // Je database naam voor de nieuwswebsite
$username = 'root'; // Je database gebruikersnaam
$password = ''; // Je database wachtwoord (leeg voor XAMPP standaard)
 
// Probeer verbinding te maken met de database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Zet PDO fouten naar uitzonderingen
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Kan geen verbinding maken met de database. " . $e->getMessage());
}
 
// Verwerk inlog- en registratieverzoeken
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['login'])) {
        // Inlogformulier ingediend
        $username = $_POST['username'];
        $password = $_POST['password'];
 
        // Zoek gebruiker in de database
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();
 
        if ($user && password_verify($password, $user['password'])) {
            // Inloggen succesvol
            // Start de sessie en sla de gebruikersgegevens op indien nodig
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = 'guest'; // Gastrol voor standaard gebruikers
 
            // Redirect naar indexpagina na succesvolle inlogpoging
            header('Location: index.php');
            exit;
        } else {
            // Inloggen mislukt
            $login_error = 'Invalid username or password';
        }
    } elseif (isset($_POST['register'])) {
        // Registratieformulier ingediend
        $username = $_POST['reg_username'];
        $password = $_POST['reg_password'];
 
        // Hash wachtwoord
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
 
        // Voeg gebruiker toe aan database met gastrol
        $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
        $stmt->execute([$username, $hashed_password]);
 
        // Redirect naar indexpagina na succesvolle registratie
        header('Location: index.php');
        exit;
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
 
<body>
    <div class="login-container">
        <h2>Login</h2>
        <form id="login-form" action="" method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="login">Login</button>
        </form>
        <?php if(isset($login_error)) echo "<p>$login_error</p>"; ?>
    </div>
 
    <div class="register-container">
        <h2>Register</h2>
        <form id="register-form" action="" method="POST">
            <input type="text" name="reg_username" placeholder="Username" required>
            <input type="password" name="reg_password" placeholder="Password" required>
            <button type="submit" name="register">Register</button>
        </form>
    </div>
</body>
 
</html>