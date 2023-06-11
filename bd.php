<?php
$servername = "localhost";
$username = "utilisateur";
$password = "eliastest";
$dbname = "bd";
$message = $_POST["message"];
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo "<p>erreur de merde</p>";
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$insert = "INSERT INTO message (nom, prenom, email, message) VALUES ('$nom', '$prenom', '$email', '$message')";

if ($conn->query($insert)) {
    echo "Nouvel enregistrement créé avec succès !";
} else {
    echo "Erreur lors de la création de l'enregistrement : " . $conn->error;
}

$select = "SELECT * FROM message";
$resultat = $conn->query($select);

echo "
<style>
    button {
        padding: 10px 20px;
        background-color: #4CAF50;
        color: white;
        border: none;
        cursor: pointer;
    }
</style>

<header>
    <button onclick=\"window.location.href='index.html'\">Accueil</button>
    <button onclick=\"window.location.href='info.php'\">Info PHP</button>
</header>";

if ($resultat && $resultat->num_rows > 0) {
    echo "<table style='width: 100%; border-collapse: collapse;'>
            <tr>
                <th style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;'>Nom</th>
                <th style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;'>Prenom</th>
                <th style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;'>Email</th>
                <th style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd; background-color: #f2f2f2;'>Message</th>
            </tr>";

    while ($row = $resultat->fetch_assoc()) {
        echo "<tr>
                <td style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd;'>".$row['nom']."</td>
                <td style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd;'>".$row['prenom']."</td>
                <td style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd;'>".$row['email']."</td>
                <td style='padding: 8px; text-align: left; border-bottom: 1px solid #ddd;'>".$row['message']."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "Aucune donnée trouvée.";
}

$conn->close();
?>

