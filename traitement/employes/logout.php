<?php
// Démarrer ou reprendre la session
session_start();

// Supprimer toutes les variables de session
$_SESSION = array();

// Si vous souhaitez détruire complètement la session, aussi bien la session que le cookie de session
// Note : Cela détruira la session, et non seulement les données de session
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Détruire la session
session_destroy();

// Rediriger l'utilisateur vers la page de connexion ou une autre page
header("Location: ../../index.php");
exit;
?>
