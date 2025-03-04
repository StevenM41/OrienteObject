<?php
    include 'header.php';


?>

<h1>Liste des Produits</h1>
<?php if(!empty($article)): ?>
    <table>
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Description</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($article as $a): ?>
            <tr>
                <td data-label="ID"><?= htmlspecialchars($a['id']) ?></td>
                <td data-label="Nom"><?= htmlspecialchars($a["nom"]) ?></td>
                <td data-label="Description"><?= htmlspecialchars($a["description"]) ?></td>
                <td data-label="Quantité"><?= htmlspecialchars($a["stock"]) ?></td>
                <td data-label="Prix"><?= htmlspecialchars($a["prix"]) ?>€</td>
                <td data-label="Actions" class="actions">
                    <a href="Forms.php?action=edit&id=<?php echo $a['id']?>&nom=<?php echo $a['nom']?>&desc=<?php echo $a['description']?>&stock=<?php echo $a['stock']?>&prix=<?php echo $a['prix']?>">Modifier</a>
                    <a href="index.php?action=delete&id=<?php echo $a['id']?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <a href="Forms.php?action=add">Ajouter un article</a>
<?php else: ?>
    <div>
        <p>Aucun élement</p>
    </div>
<?php endif; ?>

<?php include 'footer.php' ?>

