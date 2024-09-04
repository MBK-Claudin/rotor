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
    $nom = $_POST['nom'];
    $adresse = $_POST['adresse'];
    $tel = $_POST['tel'];



    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "INSERT INTO fournisseurs (nom_four, adresse_four, telephone_four)
                VALUES ('$nom', '$adresse', '$tel')
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
