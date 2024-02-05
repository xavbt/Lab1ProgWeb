<?php

require_once(realpath(__DIR__ . '/factories/ProduitFactory.php'));
require_once(realpath(__DIR__ . '/factories/CartProductFactory.php'));

class DAL
{
    private $produitFact = null;
    private $panierFact = null;

    public function ProduitFact()
    {
        if ($this->produitFact == null) {
            $this->produitFact = new ProduitFactory();
        }

        return $this->produitFact;
    }

    public function PanierFact()
    {
        if ($this->panierFact == null) {
            $this->panierFact = new CartProductFactory();
        }

        return $this->panierFact;
    }
}
