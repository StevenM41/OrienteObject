<?php
include "./vues/header.php";
session_start();

$action = $_GET['action'] ?? null;
$id = intval($_GET['id'] ?? 1);
$nom = $_GET['nom'] ?? null;
$desc = $_GET['desc'] ?? null;
$stock = intval($_GET['stock'] ?? 0);
$prix = floatval($_GET['prix'] ?? 0.0);
?>

<?php if ($action !== null): ?>
    <?php if ($action === "edit"): ?>
        <form method="post" action="index.php?action=edit&id=<?php echo $id ?>">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($nom); ?>">

            <label for="desc">Description</label>
            <textarea name="desc" id="desc"><?php echo htmlspecialchars($desc); ?></textarea>

            <label for="price">Prix</label>
            <input type="number" step="0.01" name="price" id="price" value="<?php echo htmlspecialchars($prix); ?>">

            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" id="quantity" value="<?php echo htmlspecialchars($stock); ?>">

            <button type="submit">Envoyer</button>
        </form>
    <?php elseif ($action === "add"): ?>
        <h2>Formulaire des articles</h2>
        <form method="post" action="index.php?action=add">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" value="">

            <label for="desc">Description</label>
            <textarea name="desc" id="desc"></textarea>

            <label for="price">Prix</label>
            <input type="number" step="0.01" name="price" id="price" value="">

            <label for="quantity">Quantité</label>
            <input type="number" name="quantity" id="quantity" value="">

            <button type="submit">Envoyer</button>
        </form>
    <?php endif; ?>
    <a href="index.php?action=lister">Voir les articles</a>
<?php else: ?>
    <h2>Action: <?php echo htmlspecialchars($action); ?></h2>
    <a href="index.php?action=lister">Voir les articles</a>
<?php endif; ?>

<?php include './vues/footer.php'; ?>
