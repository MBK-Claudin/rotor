<?php
// Connexion à la base de données (modifier les paramètres selon votre configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

$connexion = new mysqli($servername, $username, $password, $dbname);
session_start();
$id = $_SESSION['id'];

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}

// Exécuter la requête SQL pour récupérer tous les utilisateurs
// SELECT produits.nom_produit, produits.quantite, categories.nom_cat FROM produits JOIN categories ON categories.id_cat = produits.id_cate; 
$requete = "SELECT * FROM employes";

$resultat = $connexion->query($requete);

if ($resultat->num_rows > 0) {
    $contacts = array();

    while ($ligne = $resultat->fetch_assoc()) {
    
        $contacts[] = $ligne;
    }
    
    header('Content-Type: application/json');
    echo json_encode($contacts);
} else {
    
    echo json_encode(array("message" => "Aucun produit trouvé."));
}


$connexion->close();
?>