<?php

require 'Database.php';

class Product {
    private PDO $pdo;

    public function __construct () {
        $this->pdo = Database::getInstance()->getConnection();
    }

    /**
     * @param string $nom Le nom de l'article
     * @param string $desc
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajout ok sinon false
     */
    public function ajouter(string $nom, string $desc, int $stock, float $prix,): bool {
        $stmt = $this->pdo->prepare("INSERT INTO articles (nom, description, stock, prix) values (?,?,?,?)");
        return $stmt->execute([$nom, $desc,  $stock, $prix]);
    }

    /**
     * @param int $id
     * @param string $nom Le nom de l'article
     * @param string $desc
     * @param float $prix Le prix
     * @param int $stock La quantité
     * @return boolean true si ajout ok sinon false
     */
    public function modifier(int $id, string $nom, string $desc, float $prix, int $stock): bool {
        $stmt = $this->pdo->prepare("UPDATE articles SET nom = ?, description = ?, prix = ?, stock = ? WHERE id = ?");
        return $stmt->execute([$nom, $desc, $prix, $stock, $id]);
    }

    /**
     * @return array;
     * */
    public function lister() {
        $stmt = $this->pdo->query("SELECT * FROM articles");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param int $id
     * @return boolean
     */
    public function delete(int $id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = ?");
        return $stmt->execute([$id]);
    }
    public function getArticleById(int $id) {
        $stmt = $this->pdo->prepare("SELECT * FROM articles WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
