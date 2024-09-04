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
$sql = "SELECT * FROM voitures";
$sql1 = "SELECT * FROM fournisseurs";
$voitures = $conn->query($sql);
$voiture = $conn->query($sql);
$fournisseur = $conn->query($sql1);
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
                <h3 class="page-title"> Commandes </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#" id="newFour">Nouveau Fournisser</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="#" id="oldFour">Ancien Fournisser</a></li>
                    </ol>
                </nav>
            </div>
            <div class="row " id="nouveau" style="display: block;">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Commande de voiture</h4>
                        <form class="form-sample" id="new">
                            <p class="card-description"> Informations sur la commande</p>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">voiture</label>
                                        <div class="col-sm-9">
                                        <select class="form-control" id="id_voiture" name="id_voiture">
                                            <?php
                                            while ($row = $voitures->fetch_assoc()) {
                                                echo "<option value=" . $row["id_voiture"] . ">" . $row["marque"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">quantité</label>
                                    <div class="col-sm-9">
                                    <input type="number" class="form-control" id="quantite" name="quantite" />
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">montant</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" id="montant" name="montant"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">date</label>
                                        <div class="col-sm-9">
                                        <input class="form-control" type="date" id="date" name="date"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="card-description"> Fournisser </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">nom</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="nom_four" name="nom_four"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">adresse</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="adresse_four" name="adresse_four"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">telephone</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tel" name="tel"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">valider la vente</button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row " id="ancien" style="display: none;">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Vente de voiture</h4>
                        <form class="form-sample" id="old">
                            <p class="card-description"> Informations sur la vente</p>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">voiture</label>
                                        <div class="col-sm-9">
                                        <select class="form-control" id="id_voiture_old" name="id_voiture_old">
                                            <?php
                                            while ($row = $voiture->fetch_assoc()) {
                                                echo "<option value=" . $row["id_voiture"] . ">" . $row["marque"] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">quantité</label>
                                    <div class="col-sm-9">
                                    <input type="number" class="form-control" id="quantite_old" name="quantite_old" />
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">montant</label>
                                        <div class="col-sm-9">
                                        <input type="number" class="form-control" id="montant_old" name="montant_old"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">date</label>
                                        <div class="col-sm-9">
                                        <input class="form-control" type="date" id="date_old" name="date_old"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <p class="card-description"> Fournisseur </p>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">nom</label>
                                        <div class="col-sm-9">
                                            <select name="old_four" id="old_four" class="form-control">
                                                <?php
                                                while ($rows = $fournisseur->fetch_assoc()) {
                                                    echo "<option value=" . $rows["id_fournisseur"] . ">" . $rows["nom_four"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-primary">valider la vente</button>
                                    </div>
                                </div>
                            </div>

                        </form>
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
        document.addEventListener("DOMContentLoaded", function(){
            let newclient = document.getElementById("nouveau");
            let oldclient = document.getElementById("ancien");

            $('#newFour').click(function(){
                newclient.style.display = "block";
                oldclient.style.display = "none";
            });

            $('#oldFour').click(function(){
                newclient.style.display = "none";
                oldclient.style.display = "block";
            });

            document.getElementById("new").addEventListener("submit", function(){
                event.preventDefault(); 
    

                var formData = new FormData(document.getElementById("new"));

                if (!formData.get("id_voiture") || !formData.get("quantite") || !formData.get("montant") ||
                    !formData.get("date") || !formData.get("nom_four") || !formData.get("adresse_four") || !formData.get("tel") ) {
                    document.getElementById("new").reset();
                    alert("Tous les champs sont obligatoires !");
                }else{

                    fetch('../traitement/commandes/nouveau_fournisseur.php', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            console.log("ok !");
                            document.getElementById("new").reset();
                        } else {
                            console.log(data);
                        }
                    }).catch(error => console.error('Error:', error));
                }
            });

            document.getElementById("old").addEventListener("submit", function(){
                event.preventDefault(); 
    

                var formData = new FormData(document.getElementById("old"));

                if (!formData.get("id_voiture_old") || !formData.get("quantite_old") || !formData.get("montant_old") ||
                    !formData.get("date_old") || !formData.get("old_four") ) {
                    
                    alert("Tous les champs sont obligatoires !");

                }else{

                    fetch('../traitement/commandes/ancien_fournisseur.php', {
                        method: 'POST',
                        body: formData
                    }).then(response => response.json())
                    .then(data => {
                        if (data.message) {
                            console.log("ok !")
                            document.getElementById("old").reset();
                        } else {
                            console.log(data);
                        }
                    }).catch(error => console.error('Error:', error));
                }
            });
        })
    </script>

    <!-- End custom js for this page -->
</body>
</html>