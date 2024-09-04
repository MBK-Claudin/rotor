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
    $id = $_POST['id_voiture_old'];
    $qte = $_POST['quantite_old'];
    $montant = $_POST['montant_old'];
    $dat_vente = $_POST['date_old'];
    $id_client = $_POST['old_cli'];

    session_start();


    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {  
        
        $voiture = $conn->query("SELECT quantite_stock FROM voitures WHERE id_voiture = '$id'");
        $nbre = $voiture->fetch_assoc()['quantite_stock'];

        if($nbre < $qte){
            http_response_code(401); 
            echo json_encode(array("message" => "Impossible vendre ! Le stock est de : " . $nbre));
            exit;
        }else{
            // Préparer la requête d'insertion
            $id_emp = $_SESSION['id'];
            
            $sql = "INSERT INTO ventes (date_vente, quantite_vente, montant_vente, client_id, voiture_id, employe_id)
                    VALUES ('$dat_vente', '$qte', '$montant', '$id_client', '$id', '$id_emp')
            ";

            if ($conn->query($sql) === TRUE) {
                
                http_response_code(200); 
                echo json_encode(array("message" => "Inscription de voiture effectuée !"));
                exit;
            
            } else {
                http_response_code(401); 
                echo json_encode(array("message" => "Echec insertion du client."));
                exit;
            } 
        }
    }
} else {
    // Méthode de requête non autorisée
    http_response_code(405); 
    echo json_encode(array("message" => "Méthode de requête non autorisée."));
    exit;
}
?>
