<?php
require_once "./class/Product.php";
$productObject = new Product();

$error_message = '';
$success_message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $product = $productObject->getArticleById($id);
    if (!$product) {
        $error_message = "Produit non trouvé.";
    }
} else {
    $error_message = "ID de produit manquant.";
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nom = isset($_POST["nom"]) ? trim($_POST["nom"]) : "";
    $desc = isset($_POST["desc"]) ? trim($_POST["desc"]) : "";
    $price = isset($_POST["price"]) ? trim($_POST["price"]) : "";
    $quantity = isset($_POST["quantity"]) ? trim($_POST["quantity"]) : "";

    if ($nom === "") {
        $error_message = "Veuillez écrire un nom d'article !";
    } elseif ($price === "") {
        $error_message = "Veuillez entrer un prix !";
    } elseif ($quantity === "") {
        $error_message = "Veuillez entrer une quantité !";
    } else {
        $success = $productObject->modifier($id, $nom, $desc, $price, $quantity);
        if ($success) {
            $success_message = "Produit mis à jour avec succès.";
            header("Location: index.php");
            exit();
        } else {
            $error_message = "Erreur lors de la mise à jour du produit.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        fieldset {
            border: 1px solid #ccc;
            padding: 15px;
            border-radius: 5px;
        }
        label, input, textarea {
            display: block;
            width: 100%;
            margin-bottom: 10px;
        }
        textarea {
            height: 100px;
            resize: vertical;
        }
        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
            background-color: #0056b3;
        }
        .message {
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
    </style>
</head>
<body>

<?php if ($error_message): ?>
    <div class="message error"><?php echo $error_message; ?></div>
<?php endif; ?>

<?php if ($success_message): ?>
    <div class="message success"><?php echo $success_message; ?></div>
<?php endif; ?>

<?php if (isset($product)): ?>
    <form method="post" action="edit.php?id=<?php echo $id; ?>">
        <label for="nom">Nom</label>
        <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($product['nom']); ?>">

        <label for="desc">Description</label>
        <textarea name="desc" id="desc"><?php echo htmlspecialchars($product['description']); ?></textarea>

        <label for="price">Prix</label>
        <input type="number" step="0.01" name="price" id="price" value="<?php echo htmlspecialchars($product['prix']); ?>">

        <label for="quantity">Quantité</label>
        <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($product['stock']); ?>">

        <button type="submit">Envoyer</button>
    </form>
<?php endif; ?>

<a href="index.php">Voir les articles</a>

</body>
</html>
