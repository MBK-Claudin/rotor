<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rotor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

session_start();


$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$poste = $_SESSION["poste"];



// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les utilisateurs depuis la base de données
$sql = "SELECT 
    commandes.id_com,
    commandes.date_com as date_com,
    commandes.quantite_com as qte,
    commandes.montant_com as montant,
    employes.nom_emp as nom,
    employes.prenom_emp as prenom,
    fournisseurs.nom_four as fournisseur,
    voitures.marque as marque,
    voitures.model as model
FROM 
    commandes
JOIN 
    employes ON commandes.employe_id = employes.id_emp
JOIN 
    fournisseurs ON commandes.four_id = fournisseurs.id_fournisseur
JOIN 
    voitures ON commandes.voiture_id = voitures.id_voiture
ORDER BY 
    commandes.id_com DESC;
";
$sql1 = "SELECT 
    ventes.id_vente ,
    ventes.date_vente as date_vente,
    ventes.quantite_vente as quantite,
    ventes.montant_vente as montant,
    employes.nom_emp as nom,
    employes.prenom_emp as prenom,
    clients.nom_cli as nom_cli,
    clients.prenom_cli as prenom_cli,
    voitures.marque as marque,
    voitures.model as model
FROM 
    ventes
JOIN 
    employes ON ventes.employe_id = employes.id_emp
JOIN 
    clients ON ventes.client_id = clients.id_cli
JOIN 
    voitures ON ventes.voiture_id = voitures.id_voiture
ORDER BY 
    ventes.id_vente DESC;
";
$commandes = $conn->query($sql);
$ventes = $conn->query($sql1);
$i = 1;

//$data = $result->fetch_assoc();

// Fermer la connexion à la base de données
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ROTOR</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="../assets/vendors/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="../assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.carousel.min.css">
    <link rel="stylesheet" href="../assets/vendors/owl-carousel-2/owl.theme.default.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../assets/images/favicon.png" />
</head>
<body>
    <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
            <div class="profile-pic">
                <div class="count-indicator">
                <img class="img-xs rounded-circle " src="../assets/images/faces/face15.jpg" alt="">
                <span class="count bg-success"></span>
            </div>
            </div>
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="dashboard.php">
            <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="voiture.php">
            <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Voitures</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="caisse.php">
            <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Caisse</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="fournisseur.php">
            <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Fournisseur</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="commande.php">
            <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Commandes</span>
            </a>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="historique.php">
            <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Historique</span>
            </a>
        </li>
        </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
                <a class="navbar-brand brand-logo-mini" href="index.html"><img src="../assets/images/logo-mini.svg" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">




                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
                            <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                        </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                        <h6 class="p-3 mb-0">Profile</h6>
                        <div class="dropdown-divider"></div>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                            <div class="preview-icon bg-dark rounded-circle">
                                <i class="mdi mdi-logout text-danger"></i>
                            </div>
                            </div>
                            <div class="preview-item-content">
                                <form action="../traitement/employes/logout.php">
                                    <button class="btn btn-link" type="submit">Logout</button>
                                </form>
                            </div>
                        </a>
                        <div class="dropdown-divider"></div>
                        <p class="p-3 mb-0 text-center">Advanced settings</p>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="mdi mdi-format-line-spacing"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Historiques </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" id="vente">Ventes</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#" id="com">Commandes</a></li>
                    </ol>
                </nav>
            </div>

            <div class="row " style="display: block;" id="venteBlock">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Historique de ventes</h4>
                        <button type="button" class="btn btn-success btn-rounded btn-icon" id="addVoiture">
                            <i class="mdi mdi-account-plus "></i>
                        </button>
                        
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Date </th>
                                    <th> Quantite </th>
                                    <th> Montant </th>
                                    <th> employé </th>
                                    <th> Client </th>
                                    <th> Marque voitute</th>
                                    <th> Model </th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            // Ajoute d'autres colonnes en fonction de ta base de données 
                            // Afficher les produit dans le tableau
                            while ($row = $ventes->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $i++ . "</td>";
                                echo "<td>" . $row["date_vente"] . "</td>";
                                echo "<td>" . $row["quantite"] . "</td>";
                                echo "<td>" . $row["montant"] . "</td>";
                                echo "<td>" . $row["nom"] . " " . $row["prenom"]. "</td>";
                                echo "<td>" . $row["nom_cli"] . " " . $row['prenom_cli'] . "</td>";
                                echo "<td>" . $row["marque"] . "</td>";
                                echo "<td>" . $row["model"] . "</td>";
                                // Remplace "image_url" par le nom de la colonne contenant les liens vers les images
                                // Ajoute d'autres cellules en fonction de ta base de données
                                echo "</tr>";
                            }
                            ?>
                                
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            
            <div class="row " style="display: none;" id="comBlock">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Historique de commanes</h4>
                        <button type="button" class="btn btn-success btn-rounded btn-icon" id="addVoiture">
                            <i class="mdi mdi-account-plus "></i>
                        </button>
                        
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Date </th>
                                    <th> Quantite </th>
                                    <th> Montant de fabrication </th>
                                    <th> Employé </th>
                                    <th> Fournisseur </th>
                                    <th> Marque</th>
                                    <th> Model </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // Ajoute d'autres colonnes en fonction de ta base de données 
                                // Afficher les produit dans le tableau
                                while ($row = $commandes->fetch_assoc()) {
                                    echo "<tr>";
                                    echo "<td>" . $i++ . "</td>";
                                    echo "<td>" . $row["date_com"] . "</td>";
                                    echo "<td>" . $row["qte"] . "</td>";
                                    echo "<td>" . $row["montant"] . "</td>";
                                    echo "<td>" . $row["nom"] . " " . $row["prenom"]. "</td>";
                                    echo "<td>" . $row["fournisseur"] . "</td>";
                                    echo "<td>" . $row["marque"] . "</td>";
                                    echo "<td>" . $row["model"] . "</td>";
                                    // Remplace "image_url" par le nom de la colonne contenant les liens vers les images
                                    // Ajoute d'autres cellules en fonction de ta base de données
                                    echo "</tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                        </div>
                    </div>
                    </div>
                </div>
            </div>


        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->

        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->

    <!-- Modals -->


    <!-- plugins:js -->
    <script src="../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="../assets/vendors/chart.js/Chart.min.js"></script>
    <script src="../assets/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="../assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../assets/js/off-canvas.js"></script>
    <script src="../assets/js/hoverable-collapse.js"></script>
    <script src="../assets/js/misc.js"></script>
    <script src="../assets/js/settings.js"></script>
    <script src="../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../assets/js/dashboard.js"></script>
    <script>
        let vente = document.getElementById("venteBlock");
        let com = document.getElementById("comBlock");

        $('#com').click(function(){
            vente.style.display = "none";
            com.style.display = "block";
        });
        $('#vente').click(function(){
            vente.style.display = "block";
            com.style.display = "none";
        });
    </script>
    <!-- End custom js for this page -->
</body>
</html>