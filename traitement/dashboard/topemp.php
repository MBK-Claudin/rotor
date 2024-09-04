<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

// Créer la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Requête pour obtenir les cinq employés ayant réalisé les meilleures ventes
$sql = "SELECT 
            employes.id_emp,
            employes.nom_emp as nom,
            employes.prenom_emp as prenom,
            employes.poste as poste,
            ventes.id_vente,
            ventes.date_vente as date_vente,
            ventes.montant_vente as montant
        FROM 
            ventes
        JOIN 
            employes ON ventes.employe_id = employes.id_emp
        ORDER BY 
            ventes.montant_vente DESC
        LIMIT 5";

$result = $conn->query($sql);

$top_emps = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $top_emps[] = $row;
    }
}

echo json_encode($top_emps);

$conn->close();
?>
