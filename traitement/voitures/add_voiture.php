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
    $marque = $_POST['marque'];
    $model = $_POST['model'];
    $annee = $_POST['annee'];
    $prix = $_POST['prix'];
    $carburant = $_POST['carburant'];
    $transmission = $_POST['transmission'];
    $couleur = $_POST['couleur'];
    $place = $_POST['place'];
    $qte = $_POST['qte'];
    $photo = $_FILES['photo'];

    // Vérifier si un fichier a été téléchargé
    if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../../assets/images/voitures/";
        $target_file = $target_dir . basename($photo["name"]);
        if (move_uploaded_file($photo["tmp_name"], $target_file)) {
            $photo_path = $target_file;
        } else {
            
            http_response_code(400);
            echo json_encode(array("message" => "Échec du téléchargement de la photo."));
            exit;
        }
    } else {
        http_response_code(400);
        echo json_encode(array("message" => "Aucun fichier téléchargé ou erreur de téléchargement."));
        exit;
    }


    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "INSERT INTO voitures (marque, model, annee_fab, prix, type_carburant, type_transmission, couleur, nbr_place, quantite_stock, photo)
                VALUES ('$marque', '$model', '$annee', '$prix', '$carburant', '$transmission', '$couleur', '$place', '$qte', '$photo_path')
                ";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200); 
            echo json_encode(array("message" => "Inscription de voiture effectuée !"));
            exit;
        } else {
            http_response_code(401); 
            echo json_encode(array("message" => "Echec d'inscription de voiture."));
            exit;
        } 
    }
} else {
    // Méthode de requête non autorisée
    http_response_code(405); 
    echo json_encode(array("message" => "Méthode de requête non autorisée."));
    exit;
}
?>
