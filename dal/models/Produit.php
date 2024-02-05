<?php
class Produit
{
    public $id;
    public $nom;
    public $quantite;
    public $unite;
    public $prix;
    public $image;

    public function __construct($sql_row)
    {
        if (isset($sql_row)) {
            $this->id = $sql_row['Id'];
            $this->nom = $sql_row['Nom'];
            $this->quantite = $sql_row['Quantite'];
            $this->unite = $sql_row['Unite'];
            $this->prix = $sql_row['Prix'];
            $this->image = $sql_row['Image'];
        }
    }
}
