<?php $page_title = "Produit"; 
require_once(realpath(__DIR__ . '/dal/DAL.php'));

if (isset($_GET['id'])){
    
    $idPage = $_GET['id'];

    $dal = new DAL();
$produit = $dal->ProduitFact()->getProduit($idPage);
if ($produit == null) {
    echo "Connexion invalide";
} else {
        if($produit->id == $idPage) {
            $nomPage = $produit->nom;
            $imagePage = $produit->image;
            $poidsPage = $produit->quantite;
            $unitePage = $produit->unite;
            $prixPage = number_format($produit->prix , 2);
        }
}
?>
<div class="display-nom"><b><?php echo $nomPage ?></b></div>
<div class="product-display">
<table>
    <td><div class="display-image"> <img src="img/<?php echo $imagePage ?>"/></td>
    <td>
<form action="cart-process.php?action=add&product=<?php echo $idPage ?>" method="post">
<table>
    <tr>
<td><b>Détails du produit</b></td>
    </tr>
    <tr>
<td><?php echo $poidsPage . " "  . $unitePage ;?></td>
    </tr>
    <tr>
<td><?php echo $prixPage ?> </td>
    </tr>
    <tr>
        <td> Quantité : 
        <input type="number" name="quantite" id="quantite" value="1" min="1"/></td>
    </tr>
<tr><td><button type="submit" class="standard-button">Ajouter au panier</a></div></td></tr>
    
</table>
</form>
</td>
</table>
</div>
<?php
}
else {
    ?>
    <p>ERREUR : Pas de produit sélectionné!</p>
    <?php
}
$content = ob_get_clean(); 
require('includes/template.php');
?>
