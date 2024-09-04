<?php
session_start();


$nom = $_SESSION["nom"];
$prenom = $_SESSION["prenom"];
$poste = $_SESSION["poste"];

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
                <h5 class="mb-0 font-weight-normal"><?php $nom . " " . $prenom ?></h5>
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

                <ul class="navbar-nav navbar-nav-right">




                    <li class="nav-item dropdown">
                        <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                        <div class="navbar-profile">
                            <img class="img-xs rounded-circle" src="../assets/images/faces/face15.jpg" alt="">
                            <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php $nom . " " . $prenom ?></p>
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


            <div class="row ">
                <div class="col-12 grid-margin">
                    <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Liste des employés</h4>
                        <button type="button" class="btn btn-success btn-rounded btn-icon" id="addEmp">
                            <i class="mdi mdi-account-plus "></i>
                        </button>
                        
                        <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th> # </th>
                                    <th> Marque </th>
                                    <th> Model </th>
                                    <th> Année de fabrication </th>
                                    <th> Carburant </th>
                                    <th> Transmission </th>
                                    <th> Couleur</th>
                                    <th> Place </th>
                                    <th> Stock </th>
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
            <div class="modal-body">
                <!-- Content of your modal goes here -->
                <p id="texte"></p>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modifierEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <label>employeId</label>
                        <input type="text" class="form-control p_input" name="employeId" id="employeId">
                    </div>
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control p_input" name="nomModif" id="nomModif">
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control p_input" name="prenomModif" id="prenomModif">
                    </div>
                    <div class="form-group">
                        <label>Sexe</label>
                        <select name="sexeModif" id="sexeModif" class="form-control p_input">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control p_input" name="adresseModif" id="adresseModif">
                    </div>
                    <div class="form-group">
                        <label>Télephone</label>
                        <input type="text" class="form-control p_input" name="telModif" id="telModif">
                    </div>
                    <div class="form-group">
                        <label>Date De Naissance</label>
                        <input type="date" class="form-control p_input" name="datenaissModif" id="datenaissModif">
                    </div>
                    <div class="form-group">
                        <label>Date d'emboche</label>
                        <input type="date" class="form-control p_input" name="datembModif" id="datembModif">
                    </div>
                    <div class="form-group">
                        <label>Poste</label>
                        <select name="posteModif" id="posteModif" class="form-control p_input">
                            <option value="Responsable">Responsable</option>
                            <option value="Vendeur">Vendeur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Salaire</label>
                        <input type="number" class="form-control p_input" min="0" name="salaireModif" id="salaireModif">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">Modifier</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalAddEmp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ajouter un Employé</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content of your modal goes here -->
                <form id="registerForm" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nom</label>
                        <input type="text" class="form-control p_input" name="nom" id="nom">
                    </div>
                    <div class="form-group">
                        <label>Prenom</label>
                        <input type="text" class="form-control p_input" name="prenom" id="prenom">
                    </div>
                    <div class="form-group">
                        <label>Mot De Passe</label>
                        <input type="password" class="form-control p_input" name="passwd" id="passwd">
                    </div>
                    <div class="form-group">
                        <label>Comfimer Le Mot De Passe</label>
                        <input type="password" class="form-control p_input" name="passwd2" id="passwd2">
                    </div>
                    <div class="form-group">
                        <label>Sexe</label>
                        <select name="sexe" id="sexe" class="form-control p_input">
                            <option value="homme">Homme</option>
                            <option value="femme">Femme</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Adresse</label>
                        <input type="text" class="form-control p_input" name="adresse" id="adresse">
                    </div>
                    <div class="form-group">
                        <label>Télephone</label>
                        <input type="text" class="form-control p_input" name="tel" id="tel">
                    </div>
                    <div class="form-group">
                        <label>Date De Naissance</label>
                        <input type="date" class="form-control p_input" name="datenaiss" id="datenaiss">
                    </div>
                    <div class="form-group">
                        <label>Date d'emboche</label>
                        <input type="date" class="form-control p_input" name="datemb" id="datemb">
                    </div>
                    <div class="form-group">
                        <label>Poste</label>
                        <select name="poste" id="poste" class="form-control p_input">
                            <option value="Responsable">Responsable</option>
                            <option value="Vendeur">Vendeur</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Salaire</label>
                        <input type="number" class="form-control p_input" min="0" name="salaire" id="salaire">
                    </div>
                    <div class="form-group">
                        <label>Photo</label>
                        <input type="file" class="form-control p_input" name="photo" id="photo">
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
                Voulez vous vraiment supprimer cette employés ???
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="btnAnnuler">Annuler</button>
                <button type="button" class="btn btn-danger" id="btnSup">Supprimer</button>
            </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="ModalPass" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Mettre mot de passe à jour</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content of your modal goes here -->
                <form id="PassForm" enctype="multipart/form-data">
                <div class="form-group" style="display: none;">
                        <label>employeId</label>
                        <input type="text" class="form-control p_input" name="Idpass" id="Idpass">
                    </div>
                    <div class="form-group">
                        <label>Mot De Passe</label>
                        <input type="password" class="form-control p_input" name="passModif" id="passModif">
                    </div>
                    <div class="form-group">
                        <label>Comfimer Le Mot De Passe</label>
                        <input type="password" class="form-control p_input" name="passwd2Modif" id="passwd2Modif">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary btn-block enter-btn">enregistrer</button>
                    </div>
                </form>
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

            function employes(){
                $(document).ready(function() {
                    $.ajax({
                        url: '../traitement/employes/employe.php',
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            console.log(data);
                            var employeeTable = $('#tableau');
                            employeeTable.empty();
                            $.each(data, function(index, employe) {
                                employeeTable.append(
                                    '<tr>' +
                                        '<td>' + (index + 1) + '</td>' +
                                        '<td>' +
                                            '<img src="' + employe.photo.substring(3) + '" alt="image"  style="width: 40px; height: 40px;" />' +
                                            '<span class="pl-2">' + employe.nom_emp + ' ' + employe.prenom_emp + '</span>' +
                                        '</td>' +
                                        '<td>' + employe.sexe + '</td>' +
                                        '<td>' + employe.adresse + '</td>' +
                                        '<td>' + employe.telephone + '</td>' +
                                        '<td>' + employe.date_naiss + '</td>' +
                                        '<td>' + employe.date_emb + '</td>' +
                                        '<td>' + employe.salaire + '</td>' +
                                        '<td>' +
                                            '<button type="button" class="btn btn-warning btn-rounded btn-icon mx-1" data-id="' + employe.id_emp +'" id="mod"><i class=" mdi mdi-account-multiple-outline "></i></button>' +
                                            '<button class="btn btn-danger btn-rounded btn-icon mx-1" data-id="' + employe.id_emp +'" id="sup"><i class="mdi mdi-account-remove"></i></button>' +
                                            '<button class="btn btn-primary btn-rounded btn-icon mx-1" data-id="' + employe.id_emp +'" id="pass"><i class="mdi mdi-account-key  "></i></button>' +
                                        '</td>' +
                                    '</tr>'
                                );
                            });

                            $("#mod").click(function(){
                                console.log(data);
                                var employeId = $(this).data('id').toString();
                                var employe = data.find(emp => emp.id_emp === employeId);
                                //console.log(" Un employé : " + employe);
                                if (employe) {
                                    $('#employeId').val(employe.id_emp);
                                    $('#nomModif').val(employe.nom_emp);
                                    $('#prenomModif').val(employe.prenom_emp);
                                    $('#sexeModif').val(employe.sexe);
                                    $('#adresseModif').val(employe.adresse);
                                    $('#telModif').val(employe.telephone);
                                    $('#datenaissModif').val(employe.date_naiss);
                                    $('#datembModif').val(employe.date_emb);
                                    $('#posteModif').val(employe.poste);
                                    $('#salaireModif').val(employe.salaire);
                                    //$('#photoModif').val(''); // Le champ de la photo doit rester vide

                                    $('#modifierEmp').modal('show');

                                    document.getElementById("ModifForm").addEventListener("submit", function(){
                                        event.preventDefault(); 
            

                                        var formData = new FormData(document.getElementById("ModifForm"));

                                        if (!formData.get("nomModif") || !formData.get("prenomModif") || !formData.get("sexeModif") ||
                                            !formData.get("telModif") || !formData.get("adresseModif") || !formData.get("posteModif") ||
                                            !formData.get("datenaissModif") || !formData.get("datembModif") || !formData.get("salaireModif")) {

                                            alert("Tous les champs sont obligatoires !");
                                        }else{

                                            fetch('../traitement/employes/modification_emp.php', {
                                                method: 'POST',
                                                body: formData
                                            }).then(response => response.json())
                                            .then(data => {
                                                if (data.message) {
                                                    console.log(data.message);
                                                    document.getElementById("ModifForm").reset();
                                                    $('#modifierEmp').modal('hide');
                                                    employes();

                                                } else {
                                                    console.log(data);
                                                }
                                            }).catch(error => console.error('Error:', error));
                                        }
                                    });
                                }
                            });

                            $("#sup").click(function(){

                                var employeId = $(this).data('id').toString();
                                console.log(employeId);
                                $('#ModalSup').modal('show');

                                $("#btnSup").click(function(){
                                    xhr.open("POST", "../traitement/employes/supprimer_emp.php", true);
                                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                                    xhr.onreadystatechange = function() {
                                        if (xhr.readyState === XMLHttpRequest.DONE) {
                                            if (xhr.status === 200) {
                                                $('#SupContact').modal('hide');
                                                employes();
                                            } else {
                                                console.error("Erreur lors de la suppression de l'utilisateur : " + xhr.status);
                                            }
                                        }
                                    };
                                    xhr.send("id=" + encodeURIComponent(employeId));
                                });

                                $("#btnAnnule").click(function(){
                                    $('#ModalSup').modal('hide');
                                });
                            });

                            $("#pass").click(function(){
                                var employeId = $(this).data('id').toString();
                                var employe = data.find(emp => emp.id_emp === employeId);
                                $('#Idpass').val(employe);
                                if(employe){
                                    $('#ModalPass').modal('show');

                                    document.getElementById("PassForm").addEventListener("submit", function(){
                                        event.preventDefault(); 


                                        var formData = new FormData(document.getElementById("PassForm"));

                                        if (!formData.get("passwd2Modif") || !formData.get("passwdModif")) {
                                            alert("Tous les champs sont obligatoires !");
                                        }else if( formData.get("passwd2Modif") !== formData.get("passwdModif")){
                                            alert("Mot de passe non valide !");
                                        }
                                        else{

                                            fetch('../traitement/employes/modification_passwd.php', {
                                                method: 'POST',
                                                body: formData
                                            }).then(response => response.json())
                                            .then(data => {
                                                if (data.message) {
                                                    //alert(data.message+ " le mot de passe est: "+ data.password);
                                                    $('#modifierEmp').modal('hide');
                                                    $('#texte').val('Employé '+ employe.nom_emp + ' Modifier !');
                                                    $('#myModal').modal('show');
                                                    employes();
                                                    console.log(data.message);
                                                } else {
                                                    console.log(data);
                                                }
                                            }).catch(error => console.error('Error:', error));
                                        }
                                    });
                                }
                            });
                            
                        },
                        error: function() {
                            alert('Une erreur est survenue lors de la récupération des données.');
                        }
                    });
                });
            }

            employes();
            // fin de la fonction employes()

            // ajouter un employé
            $('#addEmp').click(function(){
                $('#modalAddEmp').modal('show');
                //addEmploye()
                document.getElementById("registerForm").addEventListener("submit", function(event) {
                    event.preventDefault(); 
            

                    var formData = new FormData(document.getElementById("registerForm"));

                    if (!formData.get("nom") || !formData.get("prenom") || !formData.get("sexe") ||
                        !formData.get("tel") || !formData.get("adresse") || !formData.get("poste") ||
                        !formData.get("passwd") || !formData.get("passwd2") ||!formData.get("datenaiss") || 
                        !formData.get("datemb") || !formData.get("salaire") ||!formData.get("photo").name) {
                        alert("Tous les champs sont obligatoires !");
                    }else if(formData.get("passwd") !== formData.get("passwd2")) {
                        alert("Mot de passe non valide !");
                    }else{

                        fetch('../traitement/employes/register.php', {
                            method: 'POST',
                            body: formData
                        }).then(response => response.json())
                        .then(data => {
                            if (data.message) {
                                //alert(data.message+ " le mot de passe est: "+ data.password);
                                document.getElementById("registerForm").reset();
                                $('#modalAddEmp').modal('hide');
                                employes();
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