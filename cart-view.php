<?php $page_title = "Panier";
require_once(realpath(__DIR__ . '/dal/DAL.php'));

$dal = new DAL();
if (isset($_COOKIE['token_name'])) {
    $token = $_COOKIE['token_name'];
} else {
    $token = generateToken();
    setcookie("token_name", $token, time() + (86400 * 30));
}

$paniers = $dal->PanierFact()->getAllpanier($token);


if ($dal->PanierFact()->getAllpanier($token) != null) {
    $paniers = $dal->PanierFact()->getAllpanier($token);
?>
        <?php
        $coutTotal = 0;
        if ($paniers == null) {
            echo "Connexion invalide";
        } else {
        ?>
            <div class="panier-articles">
            <h1>Votre panier d'achat</h1>
            </div>
            <?php
            foreach ($paniers as $produitPanier) {
                $produit = $dal->ProduitFact()->getProduit($produitPanier->produitId);
                $coutTotal += $produit->prix * $produitPanier->quantite;
            ?>
                <div class="panier-view">
                <table>
                    <td> <img src="img/<?php echo $produit->image ?>" /> </td>
                    <td> <?php echo $produitPanier->quantite . " x " . $produit->nom ?> | </td>
                    <td> <?php echo number_format($produit->prix, 2) . " $ " ?>
                        <a href="cart-process.php?action=remove&product=<?php echo $produitPanier->produitId ?>"><i class="fa-solid fa-trash"></i></a>
                </table>
                </div>

        <?php
            }
        }
        ?>
    </div>

    <center><p> Coût total : <?php echo $coutTotal ?> $ </p></center>

    <center><a href="index.php" class="standard-button">Continuer votre magasinage</a></center>
<?php
} else {
    $coutTotal = number_format(0, 2);
?>

    <div class="panier-display">
        <h1>Votre panier d'achat</h1>

        <p>Aucun produit dans le panier.</p>

        <p> Coût total : <?php echo $coutTotal ?> $ </p>

        <a href="index.php" class="standard-button">Continuer votre magasinage</a>
    <?php
}
    ?>

    </div>
    <?php
    $content = ob_get_clean();
    require('includes/template.php');
    ?>