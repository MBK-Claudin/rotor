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
    $id = $_POST['id_voiture'];
    $qte = $_POST['quantite'];
    $montant = $_POST['montant'];
    $dat_vente = $_POST['date'];
    $nom = $_POST['nom_four'];
    $adresse = $_POST['adresse_four'];
    $tel = $_POST['tel'];


    session_start();


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
            $last_id = $conn->insert_id;
            //$sql = "SELECT id_client FROM clients WHERE nom_cli = '$nom'";
            //$client = $conn->query($sql);
            //$id_client = $client->fetch_assoc()['id_client'];
            $id_emp = $_SESSION["id"];
            $sql = "INSERT INTO commandes (date_com, quantite_com, montant_com, four_id, voiture_id, employe_id)
                    VALUES ('$dat_vente', '$qte', '$montant', '$last_id', '$id', '$id_emp')
                    ";
            if($conn->query($sql) === TRUE){
                http_response_code(200); 
                echo json_encode(array("message" => "Inscription de voiture effectuée !"));
                exit;
            }
        } else {
            http_response_code(401); 
            echo json_encode(array("message" => "Echec insertion du client."));
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
