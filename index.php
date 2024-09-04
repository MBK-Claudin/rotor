<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Corona Admin</title>
        <!-- plugins:css -->
        <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
        <!-- endinject -->
        <!-- Plugin css for this page -->
        <!-- End plugin css for this page -->
        <!-- inject:css -->
        <!-- endinject -->
        <!-- Layout styles -->
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- End layout styles -->
        <!-- <link rel="shortcut icon" href="assets/images/favicon.png" /> -->
    </head>
    <body>
        <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
                <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                    <h3 class="card-title text-left mb-3">Login</h3>
                    <form id="LoginForm">
                        <div class="form-group">
                            <label for="nom">Nom Employé</label>
                            <input type="text" class="form-control p_input" name="nom" id="nom">
                        </div>
                        <div class="form-group">
                            <label for="mdp">Mot De Passe </label>
                            <input type="password" class="form-control p_input" name="mdp" id="mdp">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary btn-block enter-btn">Login</button>
                        </div>

                        <p class="sign-up">Don't have an Account?<a href="#"> Sign Up</a></p>
                    </form>
                </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
            </div>
            <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        <script src="assets/vendors/js/vendor.bundle.base.js"></script>
        <!-- endinject -->
        <!-- Plugin js for this page -->
        <!-- End plugin js for this page -->
        <!-- inject:js -->
        <script src="assets/js/off-canvas.js"></script>
        <script src="assets/js/hoverable-collapse.js"></script>
        <script src="assets/js/misc.js"></script>
        <script src="assets/js/settings.js"></script>
        <script src="assets/js/todolist.js"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function(){

                document.getElementById("LoginForm").addEventListener("submit", function(event) {
                    event.preventDefault(); // Empêcher le comportement par défaut du formulaire (rechargement de la page)

                    // Récupérer les données du formulaire
                    var nom = document.getElementById("nom").value;
                    var passwd = document.getElementById("mdp").value;

                    if(nom == "" || passwd == ""){
                        alert("Tous les champs sont obligatoire !")
                    }else{
                        // Créer un objet JSON avec les données de connexion
                        var credentials = {
                            nom: nom,
                            passwd: passwd
                        };

                        // Envoyer les données de connexion en utilisant AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.open("POST", "traitement/employes/login.php", true);
                        xhr.setRequestHeader("Content-Type", "application/json");
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState == XMLHttpRequest.DONE) {
                                console.log("Status: " + xhr.status);
                                console.log("Response: " + xhr.responseText);
                                if (xhr.status == 200) {
                                    // Le traitement est terminé avec succès
                                    document.getElementById("LoginForm").reset();
                                    var responce = JSON.parse(xhr.responseText);
                                    console.log(xhr.responseText);

                                    if(responce.poste === "Responsable"){
                                        window.location.href = "responsable/dashboard.php";
                                    }else{
                                        window.location.href = "vendeur/dashboard.php";
                                    }
                                    //window.location.href = "responsable/dashbord.php"
                                } else {
                                    console.log(xhr.responseText);
                                }
                            }
                        };
                        
                        xhr.send(JSON.stringify(credentials));   
                    }
                });
            });
        </script>
        <!-- endinject -->
    </body>
</html>