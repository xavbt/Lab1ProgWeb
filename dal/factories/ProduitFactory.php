<?php

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/Produit.php'));


class ProduitFactory extends FactoryBase
{
    public function getAllproduits()
    {
        $produits = array();

        $db = $this->dbConnect();
        $stmt = $db->prepare('SELECT * FROM tp1_produits ORDER BY Nom');
        $stmt->execute();

        while ($row = $stmt->fetch()) {
            $produits[] = new Produit($row);
        }

        $stmt->closeCursor();

        return $produits;
    }

    public function getProduit($id)
    {
        $Produit = null;

        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp1_produits WHERE Id = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        if ($row = $stmt->fetch()) {
            $Produit = new Produit($row);
        }

        $stmt->closeCursor();

        return $Produit;
    }
}
