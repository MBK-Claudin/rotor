<?php
session_start();


$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$poste = $_SESSION['poste'];

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
                <h5 class="mb-0 font-weight-normal"><?php $nom ?></h5>
                <span><?php $poste ?></span>
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
                <ul class="navbar-nav w-100">
                    <li class="nav-item w-100">
                        <form class="nav-link mt-2 mt-md-0 d-none d-lg-flex search">
                            <input type="text" class="form-control" placeholder="Search products" id="search">
                        </form>
                    </li>
                </ul>
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
                <h3 class="page-title"> Fournisseurs </h3>

            </div>

            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des Fournissers</h4>
                        <button type="button" class="btn btn-success btn-rounded btn-icon" id="addFour">
                            <i class="mdi mdi-account-plus "></i>
                        </button>
                        
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Fournisseur </th>
                                    <th> Adresse </th>
                                    <th> Telephone </th>
                                    <th> Actions </th>
                                </tr>
                            </thead>
                            <tbody id="tableau">
                                
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
    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Infos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="texte">
                <!-- Content of your modal goes here -->
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifierFour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modifier un Employé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content of your modal goes here -->
                <form id="ModifForm" enctype="multipart/form-data">
                    <div class="form-group" style="display: none;">
                        <label></label>
                        <input type="text" class="form-control p_input" name="id" id="id">
                    </div>
                    <div class="form-group">
                        <label>Nom Fournisseur</label>
                        <input type="text" class="form-control p_input" name="nomModif" id="nomModif">
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control p_input" name="adresseModif" id="adresseModif">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control p_input" name="telModif" id="telModif" >
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddFour" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter une voiture</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content of your modal goes here -->
                <form id="registerFour" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nom Fournisseur</label>
                        <input type="text" class="form-control p_input" name="nom" id="nom">
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control p_input" name="adresse" id="adresse">
                    </div>
                    <div class="form-group">
                        <label>Telephone</label>
                        <input type="text" class="form-control p_input" name="tel" id="tel" >
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Enregistrer</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="ModalSup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suppression !!!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <!-- Content of your modal goes here -->
                VOulez vous vraiment supprimer cette voiture ???
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="btnAnnuler">Annuler</button>
                <button type="button" class="btn btn-danger" id="btnSup">Supprimer</button>
            </div>
            </div>
        </div>
    </div>


    

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

            var xhr = new XMLHttpRequest();

            // recupérer et afficher les employés

            function fourniseur() {
                $(document).ready(function() {
                    let fournisseurData = [];

                    // Function to populate table
                    function populateTable(data) {
                        var fournisseurTableau = $('#tableau');
                        fournisseurTableau.empty();
                        $.each(data, function(index, fournisseur) {
                            fournisseurTableau.append(
                                '<tr>' +
                                    '<td>' + (index + 1) + '</td>' +
                                    '<td>' + fournisseur.nom_four + '</td>' +
                                    '<td>' + fournisseur.adresse_four + '</td>' +
                                    '<td>' + fournisseur.telephone_four + '</td>' +
                                    '<td>' +
                                        '<button type="button" class="btn btn-warning btn-rounded btn-icon mx-1" data-id="' + fournisseur.id_fournisseur + '" id="mod"><i class="mdi mdi-account-multiple-outline"></i></button>' +
                                        '<button class="btn btn-danger btn-rounded btn-icon mx-1" data-id="' + fournisseur.id_fournisseur + '" id="sup"><i class="mdi mdi-account-remove"></i></button>' +
                                    '</td>' +
                                '</tr>'
                            );
                        });

                        // Event handlers for dynamically added buttons
                        $(document).off('click', '#mod').on('click', '#mod', function() {
                            var fourniseurId = $(this).data('id').toString();
                            console.log(fourniseurId)
                            var fourniseur = fournisseurData.find(four => four.id_fournisseur === fourniseurId);
                            console.log(fourniseur);

                            if (fourniseur) {
                                $('#id').val(fourniseur.id_fournisseur);
                                $('#nomModif').val(fourniseur.nom_four);
                                $('#adresseModif').val(fourniseur.adresse_four);
                                $('#telModif').val(fourniseur.telephone_four);

                                $('#modifierFour').modal('show');

                                document.getElementById("ModifForm").addEventListener("submit", function(event) {
                                    event.preventDefault();

                                    var formData = new FormData(document.getElementById("ModifForm"));

                                    if (!formData.get("nomModif") || !formData.get("adresseModif") || !formData.get("telModif") ) {

                                        alert("Tous les champs sont obligatoires !");
                                    } else {
                                        fetch('../traitement/fournisseurs/modifier_fournisseur.php', {
                                            method: 'POST',
                                            body: formData
                                        }).then(response => response.json())
                                        .then(data => {
                                            if (data.message) {
                                                console.log(data.message);
                                                document.getElementById("ModifForm").reset();
                                                $('#modifierFour').modal('hide');
                                                fourniseur();
                                            } else {
                                                console.log(data);
                                            }
                                        }).catch(error => console.error('Error:', error));
                                    }
                                });
                            }
                        });

                        $(document).off('click', '#sup').on('click', '#sup', function() {
                            var fourniseurId = $(this).data('id').toString();
                            console.log(fourniseurId);

                            $('#ModalSup').modal('show');

                            $("#btnSup").off('click').on('click', function() {
                                $.ajax({
                                    url: '../traitement/fournisseurs/supprimer_fournisseur.php',
                                    type: 'POST',
                                    data: { id: fourniseurId },
                                    success: function(response) {
                                        $('#ModalSup').modal('hide');
                                        console.log("Suppression réussie !");
                                        fourniseur();
                                    },
                                    error: function(xhr, status, error) {
                                        console.error("Erreur lors de la suppression de la voiture : " + xhr.status);
                                    }
                                });
                            });

                            $("#btnAnnule").off('click').on('click', function() {
                                $('#ModalSup').modal('hide');
                            });
                        });
                    }

                    // Fetch data
                    $.ajax({
                        url: '../traitement/fournisseurs/fournisseur.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            fournisseurData = data; // Store data for search
                            populateTable(fournisseurData);
                        },
                        error: function() {
                            alert('Une erreur est survenue lors de la récupération des données.');
                        }
                    });

                    // Search functionality
                    $('#search').on('input', function() {
                        var searchTerm = $(this).val().toLowerCase();
                        console.log(searchTerm)
                        var filteredData = fournisseurData.filter(function(fournisseur) {
                            return fournisseur.nom_four.toLowerCase().includes(searchTerm) ||
                                fournisseur.adresse_four.toLowerCase().includes(searchTerm) ||
                                fournisseur.telephone_four.toLowerCase().includes(searchTerm);
                        });
                        populateTable(filteredData);
                    });
                });
            }

            function createTableRow(index, voiture) {
                return '<tr>' +
                            '<td>' + (index + 1) + '</td>' +
                            '<td>' +
                                '<img src="' + voiture.photo.substring(3) + '" alt="image" style="width: 40px; height: 40px;" />' +
                                '<span class="pl-2">' + voiture.marque + '</span>' +
                            '</td>' +
                            '<td>' + voiture.model + '</td>' +
                            '<td>' + voiture.annee_fab + '</td>' +
                            '<td>' + voiture.type_carburant + '</td>' +
                            '<td>' + voiture.type_transmission + '</td>' +
                            '<td>' + voiture.couleur + '</td>' +
                            '<td>' + voiture.place + '</td>' +
                            '<td>' + voiture.quantite_stock + '</td>' +
                            '<td>' +
                                '<button type="button" class="btn btn-warning btn-rounded btn-icon mx-1" data-id="' + voiture.id_voiture + '" id="mod">' +
                                    '<i class="mdi mdi-account-multiple-outline"></i>' +
                                '</button>' +
                                '<button class="btn btn-danger btn-rounded btn-icon mx-1" data-id="' + voiture.id_voiture + '" id="sup">' +
                                    '<i class="mdi mdi-account-remove"></i>' +
                                '</button>' +
                            '</td>' +
                        '</tr>';
            }

            fourniseur();
            // fin de la fonction employes()

            // ajouter un employé
            $('#addFour').click(function(){
                $('#modalAddFour').modal('show');
                //addEmploye()
                document.getElementById("registerFour").addEventListener("submit", function(event) {
                    event.preventDefault(); 
            

                    var formData = new FormData(document.getElementById("registerFour"));

                    if (!formData.get("nom") || !formData.get("adresse") || !formData.get("tel")) {
                        alert("Tous les champs sont obligatoires !");
                    }else{

                        fetch('../traitement/fournisseurs/add_fournisseur.php', {
                            method: 'POST',
                            body: formData
                        }).then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                alert("ok !");
                                document.getElementById("registerFour").reset();
                                $('#modalAddFour').modal('hide');
                                fourniseur();
                                //employes();
                            } else {
                                console.log(data);
                            }
                        }).catch(error => console.error('Error:', error));
                    }
                });
            });

        });
    </script>
    <!-- End custom js for this page -->
</body>
</html>