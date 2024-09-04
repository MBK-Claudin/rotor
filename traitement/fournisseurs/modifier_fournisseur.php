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
    $nom = $_POST['nomModif'];
    $adresse = $_POST['adresseModif'];
    $tel = $_POST['telModif'];


    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "UPDATE fournisseurs
                SET nom_four = '$nom', adresse_four = '$adresse', telephone_four = '$tel'
                WHERE id_fournisseur = '$id'
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
