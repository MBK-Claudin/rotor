<?php
// Connexion à la base de données (modifier les paramètres selon votre configuration)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

$connexion = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion à la base de données
if ($connexion->connect_error) {
    die("Connexion échouée : " . $connexion->connect_error);
}

// Exécuter la requête SQL pour récupérer tous les utilisateurs
// SELECT produits.nom_produit, produits.quantite, categories.nom_cat FROM produits JOIN categories ON categories.id_cat = produits.id_cate; 
$requete = "SELECT * FROM voitures";

$resultat = $connexion->query($requete);

if ($resultat->num_rows > 0) {
    $data = array();

    while ($ligne = $resultat->fetch_assoc()) {
    
        $data[] = $ligne;
    }
    
    header('Content-Type: application/json');
    echo json_encode($data);
} else {
    
    echo json_encode(array("message" => "Aucun produit trouvé."));
}


$connexion->close();
?>