
<?php
require_once "./models/Product.php";
$productObject = new Product();
$products = $productObject->lister();

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $success = $productObject->delete($id);
    header("Location: index.php");
}
include "vues/header.php";
?>
<h1>Liste des Produits</h1>
<?php if(!empty($products)): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Prix</th>
            <th>Quantité</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($products as $a): ?>
            <tr>
                <td data-label="ID"><?= htmlspecialchars($a["id"]) ?></td>
                <td data-label="Nom"><?= htmlspecialchars($a["nom"]) ?></td>
                <td data-label="Description"><?= htmlspecialchars($a["description"]) ?></td>
                <td data-label="Prix"><?= htmlspecialchars($a["prix"]) ?>€</td>
                <td data-label="Quantité"><?= htmlspecialchars($a["stock"]) ?></td>
                <td data-label="Actions" class="actions">
                    <a href="edit.php?id=<?= $a['id'] ?>">Modifier</a>
                    <a href="index.php?id=<?= $a['id'] ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="add.php">Ajouté un article</a>
    <?php else: ?>
        <p>Aucun produits trouvés</p>
        <a href="add.php">Ajouté un article</a>
    <?php endif; ?>

<?php include 'vues/footer.php'?>