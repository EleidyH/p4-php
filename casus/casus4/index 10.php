<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uitgebreide Rekenmachine</title>
</head>
<body>
    <h1>Uitgebreide Rekenmachine</h1>
    <form method="post" action="">
        <label for="calculation">Voer een berekening in:</label>
        <input type="text" id="calculation" name="calculation" required>
        <br>
        <label for="precision">Rondingsprecisie:</label>
        <input type="number" id="precision" name="precision" value="2" required>
        <br>
        <input type="submit" value="Bereken">
    </form>

    <?php
    // Database configuratie
    $servername = "localhost";
    $username = "root";
    $password = ""; // Vul hier je database wachtwoord in
    $dbname = "calculations";

    // Verbinden met de database
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Basisfuncties
    function add($numbers) {
        return array_sum($numbers);
    }

    function subtract($numbers) {
        $result = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            $result -= $numbers[$i];
        }
        return $result;
    }

    function multiply($numbers) {
        $result = 1;
        foreach ($numbers as $number) {
            $result *= $number;
        }
        return $result;
    }

    function divide($numbers) {
        $result = $numbers[0];
        for ($i = 1; $i < count($numbers); $i++) {
            if ($numbers[$i] != 0) {
                $result /= $numbers[$i];
            } else {
                return "Error: Division by zero";
            }
        }
        return $result;
    }

    // Geavanceerde functies
    function power($base, $exponent) {
        return pow($base, $exponent);
    }

    function modulo($number, $modulus) {
        return $number % $modulus;
    }

    function squareRoot($number) {
        return sqrt($number);
    }

    function roundNumber($number, $precision) {
        return round($number, $precision);
    }

    // Functie voor het opslaan van berekeningen in de database
    function calculateAndSave($conn, $input, $result) {
        $stmt = $conn->prepare("INSERT INTO calculations (input, result) VALUES (?, ?)");
        $stmt->bind_param("ss", $input, $result);
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully<br>";
        } else {
            echo "Error: " . $stmt->error . "<br>";
        }
        $stmt->close();
    }

    // Functie om opgeslagen berekeningen op te vragen
    function getCalculations($conn) {
        $sql = "SELECT * FROM calculations";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "ID: " . $row["id"] . " - Input: " . $row["input"] . " - Result: " . $row["result"] . "<br>";
            }
        } else {
            echo "0 results<br>";
        }
    }

    // Functie om de invoer te verwerken
    function processInput($input) {
        // Vervang 'x' door '*' voor vermenigvuldiging
        $input = str_replace('x', '*', $input);
        // Vervang '^' door '**' voor machtsverheffen
        $input = str_replace('^', '**', $input);
        // Vervang '√' door 'sqrt(' en voeg ')'
        $input = preg_replace('/(\d+)√/', 'sqrt($1)', $input);
        $input = str_replace('√', 'sqrt', $input);

        // Bereken de waarde van de uitdrukking
        try {
            eval('$result = ' . $input . ';');
            return $result;
        } catch (ParseError $e) {
            echo "Error: Invalid input<br>";
            return null;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $input = $_POST['calculation'];
        $precision = $_POST['precision'];

        // Verwerk de invoer en bereken het resultaat
        $result = processInput($input);
        if ($result !== null) {
            $roundedResult = roundNumber($result, $precision);
            echo "Input: $input<br>";
            echo "Result: " . $roundedResult . "<br>";

            // Berekening opslaan in de database
            calculateAndSave($conn, $input, $roundedResult);
        } else {
            echo "Failed to process input<br>";
        }

        echo "<h2>Opslag van Berekeningen</h2>";
        getCalculations($conn);
    }

    // Sluit de databaseverbinding
    $conn->close();
    ?>
</body>
</html>
