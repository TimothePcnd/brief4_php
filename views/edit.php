<?php
include 'header.php';

require_once "../models/Produit.php";

session_start();

$pdo = Database::getInstance()->getConnection();
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = 0;
}

$produits = Produit::loadById($id);
?>

<form action="../../brief4_php/index.php?action=edit&id=<?php echo $id ?>" method="post">
    <h2>Modifier produit</h2>
    <label for="nom">Nom :</label>
    <input type="text" id="nom" name="nom" required>

    <label for="prix">Prix : </label>
    <input type="number" name="prix" id="prix" required>

    <label for="stock">Stock : </label>
    <input type="number" id="stock" name="stock" required></input>

    <button type="submit">Valider</button>

</form>

<?php
include 'footer.php'
?>
