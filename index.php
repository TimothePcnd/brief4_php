<?php

/**
 * Front controller
 *
 * Point d'entrée de l'application
 * Il lit les paramètres passés dans l'URL
 * Selon ces paramètres, il instancie le contrôleur qui convient
 */

// Démarrage de la session
session_start();

// Inclusion des contrôleurs (ici, il y a que voiture)
require_once 'controllers/ProduitController.php';

$action = isset($_GET['action']) ? $_GET['action'] : 'details';

// Même chose avec l'id
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Instanciation du contrôleur
$controller = new ProduitController();

/*// Routage (selon la valeur de l'action)
if ($action == 'details') {
    // Appel de la méthode pour afficher les détails de la voiture
    $controller->details($id);
} else {
    // Si l'action n'existe pas
    echo "Action n'existe pas";
}*/

switch ($action) {
    case 'details':
        $controller->details();
        break;
    case 'ajouter':
        $controller->ajouter();
        break;
    case 'delete':
        $controller->delete($id);
        break;
    case 'edit':
        $controller->edit($id);
        break;
    default:
        // Si l'action n'existe pas
        echo "Action n'existe pas";
}


