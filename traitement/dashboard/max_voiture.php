<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour obtenir la voiture la plus vendue
$sql = "SELECT 
            voitures.id_voiture,
            voitures.marque,
            voitures.model,
            voitures.annee_fab,
            voitures.prix,
            voitures.type_carburant,
            voitures.type_transmission,
            voitures.couleur,
            voitures.nbr_place,
            voitures.quantite_stock,
            voitures.photo,
            SUM(ventes.quantite_vente) as total_ventes
        FROM 
            ventes
        JOIN 
            voitures ON ventes.voiture_id = voitures.id_voiture
        GROUP BY 
            voitures.id_voiture
        ORDER BY 
            total_ventes DESC
        LIMIT 1";

$result = $conn->query($sql);

$top_car = [];

if ($result->num_rows > 0) {
    $top_car = $result->fetch_assoc();
}

echo json_encode($top_car);

$conn->close();
?>
