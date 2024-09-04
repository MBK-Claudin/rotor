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

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Récupérer les utilisateurs depuis la base de données

$total_vente = $conn->query("SELECT SUM(ventes.montant_vente) as total_vente FROM ventes;");
$vente = $conn->query("SELECT 
    SUM(montant_vente) AS total_ventes, 
    COUNT(*) AS nombre_ventes, 
    SUM(quantite_vente) AS quantite_totale_vendue 
FROM ventes;
");
$vente_mois = $conn->query("SELECT 
    DATE_FORMAT(date_vente, '%Y-%m') AS mois, 
    SUM(montant_vente) AS total_ventes, 
    COUNT(*) AS nombre_ventes, 
    SUM(quantite_vente) AS quantite_totale_vendue 
FROM ventes 
GROUP BY mois;
");
$rentabilite = $conn->query("SELECT 
    (SUM(ventes.montant_vente) - SUM(commandes.montant_com)) AS marge_beneficiaire 
FROM ventes 
JOIN commandes ON ventes.voiture_id = commandes.voiture_id;
");

$chiffre_affaire = $conn->query("SELECT 
    (SELECT SUM(montant_vente) FROM ventes) AS total_ventes, 
    (SELECT SUM(montant_com) FROM commandes) AS total_commandes;
");

$emp = $conn->query("SELECT COUNT(*) as emp FROM employes;");

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
                <div class="profile-name">
                <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></h5>

                <span><?php echo $_SESSION['poste']; ?></span>
                </div>
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
            <a class="nav-link" href="employe.php">
            <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Employés</span>
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
                            <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['nom'] . " " . $_SESSION['prenom']; ?></p>
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

            <div class="row">
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">$<?php echo  $total_vente->fetch_assoc() ['total_vente']; ?></h3>

                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Ventes</h6>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">$<?php echo  $chiffre_affaire->fetch_assoc()['total_commandes'] ; ?></h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Total Commandes</h6>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0">$<?php echo  $rentabilite->fetch_assoc() ['marge_beneficiaire']; ?></h3>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-danger">
                            <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                            </div>
                        </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Rentabilité des sur ventes</h6>
                    </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="row">
                        <div class="col-9">
                            <div class="d-flex align-items-center align-self-start">
                            <h3 class="mb-0"><?php $emp->fetch_assoc()['emp'] ?></h3>
                            <p class="text-success ml-2 mb-0 font-weight-medium">+3.5%</p>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="icon icon-box-success ">
                            <span class="mdi mdi-arrow-top-right icon-item"></span>
                            </div>
                        </div>
                        </div>
                        <h6 class="text-muted font-weight-normal">Expense current</h6>
                    </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Transaction History</h4>
                            <div id="max-voiture" class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">

                            </div>
                            <div id="min-voiture" class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 grid-margin stretch-card">
                    <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-row justify-content-between">
                        <h4 class="card-title mb-1">Top Vendeur</h4>
                        <p class="text-muted mb-1">vente</p>
                        </div>
                        <div class="row">
                        <div class="col-12">
                            <div class="preview-list" id="topemp">
                            </div>
                        </div>
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
        document.addEventListener("DOMContentLoaded", function(){
            $.ajax({
                url: '../traitement/dashboard/topemp.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    const container = document.getElementById("topemp")
                    container.innerHTML = '';

                    data.forEach(emp => {
                        const empItem = `
                            <div class="preview-item border-bottom">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-primary">
                                        <i class="mdi mdi-file-document"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content d-sm-flex flex-grow">
                                    <div class="flex-grow">
                                        <h6 class="preview-subject">${emp.nom} ${emp.prenom}</h6>
                                        <p class="text-muted mb-0">Poste: ${emp.poste}</p>
                                    </div>
                                    <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                                        <p class="text-muted">Date de la vente: ${emp.date_vente}</p>
                                        <p class="text-muted mb-0">Montant de la vente: ${emp.montant} €</p>
                                    </div>
                                </div>
                            </div>`;
                        container.innerHTML += empItem;
                    });
                    
                },
                error: function() {
                    alert('Une erreur est survenue lors de la récupération des données.');
                }
            });

            $.ajax({
                url: '../traitement/dashboard/max_voiture.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        const container = document.getElementById('max-voiture');
                        const carItem = `
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">${data.marque} ${data.model}</h6>
                                <p class="text-muted mb-0">Année: ${data.annee_fab}</p>
                                <p class="text-muted mb-0">Couleur: ${data.couleur}</p>
                                <p class="text-muted mb-0">Nombre de places: ${data.nbr_place}</p>
                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0">${data.prix} €</h6>
                                <p class="text-muted mb-0">Total Ventes: ${data.total_ventes}</p>
                            </div>`;
                        container.innerHTML = carItem;
                    }
                },
                error: function() {
                    alert('Une erreur est survenue lors de la récupération des données.');
                }
            });

            $.ajax({
                url: '../traitement/dashboard/min_voiture.php',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    if (data) {
                        const container = document.getElementById('min-voiture');
                        const carItem = `
                            <div class="text-md-center text-xl-left">
                                <h6 class="mb-1">${data.marque} ${data.model}</h6>
                                <p class="text-muted mb-0">Année: ${data.annee_fab}</p>
                                <p class="text-muted mb-0">Couleur: ${data.couleur}</p>
                                <p class="text-muted mb-0">Nombre de places: ${data.nbr_place}</p>
                            </div>
                            <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                                <h6 class="font-weight-bold mb-0">${data.prix} €</h6>
                                <p class="text-muted mb-0">Total Ventes: ${data.total_ventes}</p>
                            </div>`;
                        container.innerHTML = carItem;
                    }
                },
                error: function() {
                    alert('Une erreur est survenue lors de la récupération des données.');
                }
            });
        })
    </script>
    <!-- End custom js for this page -->
</body>
</html>