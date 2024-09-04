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
    $prenom = $_POST['prenom'];
    $sexe = $_POST['sexe'];
    $tel = $_POST['tel'];
    $adresse = $_POST['adresse'];
    $poste = $_POST['poste'];
    $datenaiss = $_POST['datenaiss'];
    $datemb = $_POST['datemb'];
    $salaire = $_POST['salaire'];
    $photo = $_FILES['photo'];
    $passwd = $_POST['passwd2'];

    // Vérifier si un fichier a été téléchargé
    if ($photo && $photo['error'] === UPLOAD_ERR_OK) {
        $target_dir = "../../assets/images/faces/";
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

    $pass = password_hash($passwd, PASSWORD_BCRYPT);

    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "INSERT INTO employes (nom_emp, prenom_emp, mdp, sexe, adresse, telephone, date_naiss, date_emb, poste, salaire, photo)
                VALUES ('$nom', '$prenom', '$pass', '$sexe', '$adresse', '$tel', '$datenaiss', '$datemb', '$poste', '$salaire', '$photo_path')";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200); 
            echo json_encode(array("message" => "Inscription effectuée !", "password" => $passwd));
            exit;
        } else {
            http_response_code(401); 
            echo json_encode(array("message" => "Echec d'inscription."));
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
