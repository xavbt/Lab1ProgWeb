<?php 

require_once(realpath(__DIR__ . '/base/FactoryBase.php'));
require_once(realpath(__DIR__ . '/../models/ProduitCart.php'));

class CartProductFactory extends FactoryBase 
{

    public function getAllpanier($token)
    {
        $produits = array();
    
        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp1_panier WHERE Token = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$token]);
    
        while ($row = $stmt->fetch()) {
            $produits[] = new ProduitCart($row);
        }
    
        $stmt->closeCursor();
    
        return $produits;
    }

    function generateToken($length = 16) {
        $string = uniqid(rand());
        $randomString = substr($string, 0, $length);
        return $randomString;
        }


    public function getProduit($id)
    {
        $Panier = null;

        $db = $this->dbConnect();
        $sql = "SELECT * FROM tp1_panier WHERE ProduitId = ?";
        $stmt = $db->prepare($sql);
        $stmt->execute([$id]);

        if ($row = $stmt->fetch()) {
            $Panier = new ProduitCart($row);
        }

        $stmt->closeCursor();

        return $Panier;
    }

    function updateProduit($id, $qte, $token) {
        $db = $this->dbConnect();
        $stmt  = $db->prepare('UPDATE tp1_panier SET Quantite=? WHERE ProduitId=? AND Token=?');
        $stmt->execute([$qte, $id, $token]);
    }

    function removeProduit($id, $token) {
        $db = $this->dbConnect();
        $stmt  = $db->prepare('DELETE FROM tp1_panier WHERE ProduitId=? AND Token=?');
        $stmt->execute([$id, $token]);
    }
    
    function addProduit($id, $qte, $token)
        {
            var_dump([$id, $qte, $token]);
            $db = $this->dbConnect();
            $stmt = $db->prepare('INSERT INTO tp1_panier (ProduitId, Quantite, Token) VALUES (?,?,?)');
            $stmt->execute([$id, $qte, $token]);
        }
    }