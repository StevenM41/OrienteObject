<?php
require_once "./class/Product.php";
$productObject = new Product();
$products = $productObject->lister();

if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $success = $productObject->delete($id);
    header("Location: index.php");
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        h1 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #ddd;
        }

        a {
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .actions {
            display: flex;
            gap: 10px;
        }

        .actions a {
            padding: 5px 10px;
            border: 1px solid #007BFF;
            border-radius: 4px;
        }

        .actions a:hover {
            background-color: #007BFF;
            color: white;
        }
    </style>
</head>
<body>
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
                    <a href="edit.php?id=<?= $a["id"]; ?>">Modifier</a>
                    <a href="index.php?id=<?= $a["id"]; ?>">Supprimer</a>
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
</body>
</html>