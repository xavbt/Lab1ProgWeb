<?php
require_once(realpath(__DIR__ . '/dal/DAL.php'));
$dal = new DAL();



if  (isset($_GET['action'])) {

    if (isset($_COOKIE['token_name'])) {
        $token = $_COOKIE['token_name'];
    } else 
    { $token = generateToken(); 
        setcookie("token_name", $token , time() + (86400 * 30));
    }

    switch($_GET['action']) {
        case "add":
            if (isset($_GET["product"]) && isset($_POST["quantite"])) {
               
                $produitPanier = $dal->PanierFact()->getProduit($_GET["product"]);
                if ($produitPanier->quantite > 0) {
                    $newquantite = $produitPanier->quantite + $_POST["quantite"];
                    $dal->PanierFact()->updateProduit($_GET["product"],$newquantite,$token);
                    
                }
                else {
                    $dal->PanierFact()->addProduit($_GET["product"],$_POST["quantite"],$token);
                }

                header('Location: cart-view.php');
            }
            break;
        case "remove": 
            if (isset($_GET["product"])){
                $dal->PanierFact()->removeProduit($_GET["product"],$token);
            }
          header("Location: cart-view.php");
            break;
        }
    }
 else {
    //retour à la page index.php
    header('Location:index.php');
}
?>
