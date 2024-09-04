<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "rotor";

    $connexion = new mysqli($servername, $username, $password, $dbname);

    // Vérifier la connexion à la base de données
    if ($connexion->connect_error) {
        die("Connexion échouée : " . $connexion->connect_error);
    }

    // Préparer et exécuter la requête SQL pour supprimer l'utilisateur de la base de données
    $requete = $connexion->prepare("DELETE FROM employes WHERE id_emp = ?");
    $requete->bind_param("i", $id);

    if ($requete->execute()) {
        // Suppression réussie
        http_response_code(200); // OK
        echo json_encode(array("message" => "contact supprimé avec succès."));
    } else {
        // Erreur lors de la suppression
        http_response_code(500); // Internal Server Error
        echo json_encode(array("message" => "Erreur lors de la suppression du contact."));
    }

    // Fermer la connexion à la base de données
    $requete->close();
    $connexion->close();
} else {
    // Méthode de requête non autorisée
    http_response_code(405); // Method Not Allowed
    echo json_encode(array("message" => "Méthode de requête non autorisée."));
}
?>
