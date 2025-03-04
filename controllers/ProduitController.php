<?php
require_once __DIR__ . '/../models/Produit.php';

class ProduitController {
    /**
     * function details
     * Afficher les détails du produit (selon l'id)
     *
     */

    public function details() {
        // Chargement de la voiture
        $produit = Produit::loadProducts();

        //echo $produit;

        if (!$produit) {
            echo "  Produit non trouvée";
            return ;
        }

        // Inclusion de la vue
        include __DIR__ . '/../views/produitDetails.php';
    }

    public function ajouter() {
        // Chargement de la voiture

        Produit::ajouter($_POST['nom'], $_POST['prix'], $_POST['stock']);

        header("Location: index.php");
    }

    public function delete($id) {
        Produit::delete($id);
        header("Location: index.php");
    }

    public function edit($id) {
        Produit::edit($_POST['nom'], $_POST['prix'], $_POST['stock'], $id);
        header("Location: index.php");
    }


}
