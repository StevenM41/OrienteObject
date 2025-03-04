<?php
    session_start();

    $dossier = 'controllers/';

    if (is_dir($dossier)) {
        $fichiers = scandir($dossier);

        foreach ($fichiers as $fichier) {
            if ($fichier !== "." && $fichier !== "..") {
                $chemin_complet = $dossier . $fichier;

                if (is_file($chemin_complet)) { // Vérifie que ce n'est pas un dossier
                    include_once $chemin_complet;
                }
            }
        }
    } else {
        echo "Le dossier n'existe pas.";
    }

    $action = isset($_GET['action']) ? $_GET['action'] : 'lister';
    $success = $_GET['success'] ?? false;
    $id = isset($_GET["id"]) ? intval($_GET['id']) : 1;
    $nom = isset($_GET["nom"]) ? $_GET['nom'] : null;
    $desc = isset($_GET["desc"]) ? $_GET['desc'] : null;
    $stock = isset($_GET["stock"]) ? intval($_GET['stock']) : 0;
    $prix = isset($_GET["prix"]) ? floatval($_GET['prix']) : 0.0;

    $controller = new ProductController();

    switch ($success) {
        case 'false':
            echo "Echec !";
            break;
        case 'true':
            echo "Success !";
            break;
    }

    switch ($action) {
        case 'lister': $controller->listProduct(); break;
        case 'add':
            $controller->addProduct();
            $controller->listProduct();
            break;
        case 'edit':
            $controller->modifie();
            $controller->listProduct();
        break;
        case 'delete':
            $controller->delProduct($id);
            $controller->listProduct();
            break;
    }

