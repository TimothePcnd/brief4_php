<?php
include 'header.php';
?>


<h1> Liste des produits</h1>
<?php
if (empty($produit)) {
    echo "<p>Erreur : Produit non trouvé </p>";
    include 'footer.php';
    exit;
}
?>

<table>
    <thead>
    <tr>

        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Stock</th>
        <th>Modifier</th>
        <th>Supprimer</th>
    </tr>
    </thead>

    <tbody>
    <?php foreach ($produit as $p): ?><!--// : remplace les accolade du foreach-->
        <tr>
            <td><?=htmlspecialchars($p['id'])?></td>
            <td><?=$p['nom']?></td>
            <td><?=$p['prix']?> €</td>
            <td><?=$p['stock']?></td>
            <td><a class="edit" href="/views/edit.php?id=<?=$p['id'];?>">Modifier</a></td>
            <td><a class="delete" href="index.php?action=delete&id=<?=$p['id'];?>">Supprimer</a></td>
        </tr>
    <?php endforeach; ?> <!--// Fin du foreach -->
    </tbody>
</table>
<button><a href="../views/add.php">Ajoutez un produit</a></button>



<?php
include 'footer.php';
?>
