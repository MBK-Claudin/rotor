<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Vérifier si la requête est de type POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données JSON envoyées depuis le formulaire
    $donnees = json_decode(file_get_contents("php://input"));

    // Vérifier si les données JSON ont été correctement décodées
    if ($donnees) {
        // Récupérer les informations de connexion
        $nom = $donnees->nom;
        $passwd = $donnees->passwd;

        if ($conn->connect_error) {
            http_response_code(401); 
            echo json_encode(array("message" => "Echec de connexion à la base de données."));
        }else{
            $sql = "SELECT * FROM employes WHERE nom_emp = '$nom'";
            $user = $conn->query($sql);

            if ($user->num_rows > 0) {
                $row = $user->fetch_assoc();
                $hashedPassword = $row["mdp"];
                //var_dump($row);
                
                if(password_verify($passwd, $hashedPassword)){
                    session_start();
                    
                    $_SESSION['nom'] = $row['nom_emp'];
                    $_SESSION['prenom'] = $row['prenom_emp'];
                    $_SESSION['id'] = $row['id_emp'];
                    $_SESSION['poste'] = $row['poste'];
                    $_SESSION['photo'] = $row['photo'];

                    http_response_code(200); 
                    echo json_encode(array("message" => "Connexion réussie !", "poste" => $row['poste']));
                }else{
                    http_response_code(403); 
                    echo json_encode(array("message" => "Mot de passe incorrect !".$hashedPassword." ".$passwd));
                }
            } else {
                http_response_code(402); 
                echo json_encode(array("message" => "Addresse mail incorrect!"));
            }
        }

    } else {
        // Données JSON non valides
        http_response_code(400); 
        echo json_encode(array("message" => "Données de connexion invalides."));
    }
} else {
    // Méthode de requête non autorisée
    http_response_code(405); 
    echo json_encode(array("message" => "Méthode de requête non autorisée."));
}
?>
