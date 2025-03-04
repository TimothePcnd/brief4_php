<?php
include 'header.php'
?>

<form action="../../brief4_php/index.php?action=ajouter" method="post">
    <h2>AJOUTER UN PRODUIT</h2>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prix">Prix : </label>
    <input type="number" name="prix" id="prix" required>

    <label for="stock">Stock : </label>
    <input type="number" id="nombre" name="stock" required></input>

    <button type="submit">Valider</button>

</form>

<?php
include 'footer.php'
?>