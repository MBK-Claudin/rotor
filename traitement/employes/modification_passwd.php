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

    $id = $_POST['Idpass'];
    $passwd = $_POST['passwd2Modif'];

    $pass = password_hash($passwd, PASSWORD_BCRYPT);

    if ($conn->connect_error) {
        http_response_code(401); 
        echo json_encode(array("message" => "Echec de connexion à la base de données."));
        exit;
    } else {    
        // Préparer la requête d'insertion
        $sql = "UPDATE employes
                SET mdp = '$pass'
                WHERE id_emp = '$id'
                ";

        if ($conn->query($sql) === TRUE) {
            http_response_code(200); 
            echo json_encode(array("message" => "Mot de passe mis à jour !"));
            exit;
        } else {
            http_response_code(401); 
            echo json_encode(array("message" => "Echec de mise à jour de mot de passe."));
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
