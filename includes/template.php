<!DOCTYPE html>
<html lang="fr">
    <head>
        <title><?= $page_title ?></title>
        <meta charset="utf-8" />
        <link href="css/site.css" rel="stylesheet" /> 
        <script src="https://kit.fontawesome.com/cc23966d77.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    </head>

<body>
<div class="container">
<header>
<h1>Mon épicerie en ligne</h1>
<div class="menu">
<a href="index.php" class="menu"> <i class="fa-sharp fa-solid fa-house"></i>Accueil</a> | <a href="cart-view.php" class="menu"> <i class="fa-solid fa-cart-shopping"></i>Mon panier</a>
</div>
</header>
<main>
 <?= $content ?>
 </main>
<footer>
<p class="your-name">Xavier Boivin-Thibeault</p>
<p>Tous droits réservés © cchic.ca</p>
</footer>
</div>
</body>
</html>