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
    $id = $_POST['employeId'];
    $nom = $_POST['nomModif'];
    $prenom = $_POST['prenomModif'];
    $sexe = $_POST['sexeModif'];
    $tel = $_POST['telModif'];
    $adresse = $_POST['adresseModif'];
    $poste = $_POST['posteModif'];
    $datenaiss = $_POST['datenaissModif'];
    $datemb = $_POST['datembModif'];
    $salaire = $_POST['salaireModif'];

    error_log("ID: $id, Nom: $nom, Prénom: $prenom, Sexe: $sexe, Tel: $tel, Adresse: $adresse, Poste: $poste, Date de Naissance: $datenaiss, Date d'embauche: $datemb, Salaire: $salaire");


    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "UPDATE employes
                SET nom_emp = '$nom', prenom_emp = '$prenom',sexe = '$sexe', adresse = '$adresse', telephone = '$tel', date_naiss = '$datenaiss', date_emb = '$datemb', poste = '$poste', salaire = '$salaire'
                WHERE id_emp = '$id'
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
