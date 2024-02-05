<?php $page_title = "Accueil"; 
require_once(realpath(__DIR__ . '/dal/DAL.php'));
?>

<?php ob_start(); ?>

<div class="product-list">

<?php 
$dal = new DAL();
$produits = $dal->ProduitFact()->getAllproduits();
if ($produits == null) {
    echo "Connexion invalide";
} else {
     foreach ($produits as $produit) {
?>

<div class="product-item"> <div class="product-image"> <img src="img/<?php echo $produit->image ?>"/> </div> <div class="product-name"><?php echo $produit->nom ?></div>
<a href="product-view.php?id=<?php echo $produit->id ?>" class="standard-button">Voir l'article</a></div> 
 <?php }
  }
  ?>
  </div> <?php
$content = ob_get_clean(); 
require('includes/template.php');
?>


