<?php

require_once __DIR__ . '/../models/Product.php';

class ProductController {

    public function addProduct() {

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = trim($_POST["nom"] ?? "");
            $desc = trim($_POST["desc"] ?? "");
            $prix = floatval($_POST["price"] ?? 0);
            $stock = intval($_POST["quantity"] ?? 0);

            if ($nom === "") {
                return "Veuillez écrire un nom d'article !";
            } elseif ($desc === "") {
                return "Veuillez entrer une description !";
            } elseif ($prix <= 0) {
                return "Veuillez entrer un prix valide !";
            } elseif ($stock < 0) {
                return "Veuillez entrer une quantité valide !";
            }
        }

        $product = new Product();
        return $product->ajouter($nom, $desc, $stock, $prix);
    }

    public function modifie() {
        $id = isset($_GET['id']) ? intval($_GET['id']) : null;

        if ($id === null) {
            return "ID de l'article manquant !";
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nom = trim($_POST["nom"] ?? "");
            $desc = trim($_POST["desc"] ?? "");
            $prix = floatval($_POST["price"] ?? 0);
            $stock = intval($_POST["quantity"] ?? 0);

            if ($nom === "") {
                return "Veuillez écrire un nom d'article !";
            } elseif ($desc === "") {
                return "Veuillez entrer une description !";
            } elseif ($prix <= 0) {
                return "Veuillez entrer un prix valide !";
            } elseif ($stock < 0) {
                return "Veuillez entrer une quantité valide !";
            }
        }

        $product = new Product();
        return $product->modifier($id, $nom, $desc, $stock, $prix);
    }

    public function delProduct($id) {
        $product = new Product();
        return $product->delete($id);
    }

    public function listProduct() {
        $p = new Product();
        $article = $p->lister();
        include __DIR__ . '/../vues/productDetails.php';
    }

    public function getProductById($id) {
        $p = new Product();
        $article = $p->getArticleById($id);
    }
}