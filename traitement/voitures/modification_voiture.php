<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    http_response_code(500);
    echo json_encode(array("message" => "Connection failed: " . $conn->connect_error));
    exit;
}

// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données JSON envoyées depuis le formulaire
    $id = $_POST['id'];
    $marque = $_POST['marqueModif'];
    $model = $_POST['modelModif'];
    $annee = $_POST['anneeModif'];
    $prix = $_POST['prixModif'];
    $carburant = $_POST['carburantModif'];
    $transmission = $_POST['transmissionModif'];
    $couleur = $_POST['couleurModif'];
    $place = $_POST['placeModif'];
    $qte = $_POST['qteModif'];


    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "UPDATE voitures
                SET marque = '$marque', model = '$model',annee_fab = '$annee', prix = '$prix', type_carburant = '$carburant', type_transmission = '$transmission', couleur = '$couleur', nbr_place = '$place', quantite_stock = '$qte'
                WHERE id_voiture = '$id'
                ";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200); 
            echo json_encode(array("message" => "Modification effectuée !"));
        } else {
            http_response_code(401); 
            echo json_encode(array("message" => "Echec de Modification."));
        } 
    }
} else {
    // Méthode de requête non autorisée
    http_response_code(405); 
    echo json_encode(array("message" => "Méthode de requête non autorisée."));
}
?>
