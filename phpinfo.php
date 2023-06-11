<?php
$servername = "localhost";
$username = "nom_d_utilisateur";
$password = "mdp";
$dbname = "nom_bd";

$conn = new mysqli($servername, $username, $password);

if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

$sql = "CREATE DATABASE $dbname";
if ($conn->query($sql) === TRUE) {
    echo "La base de données a été créée avec succès !";
} else {
    echo "Erreur lors de la création de la base de données : " . $conn->error;
}

$conn->close();
?>