<?php
include 'header.php'
?>

<form action="../../brief4_php/index.php?action=ajouter" method="post">
    <h2>AJOUTER UN PRODUIT</h2>

    <label for="nom">Nom</label>
    <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($produit->getNom() ?? '') ?>"><br>

    <label for="prix">Prix</label>
    <input type="text" id="prix" name="prix" value="<?= htmlspecialchars($produit->getPrix() ?? '') ?>"><br>

    <label for="stock">Stock</label>
    <input type="text" id="stock" name="stock" value="<?= htmlspecialchars($produit->getStock() ?? '') ?>"><br>

    <button type="submit">Modifier</button>

</form>

<?php
include 'footer.php'
?>