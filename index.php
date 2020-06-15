<?php
session_start();
require 'inc/data/products.php';
require 'inc/head.php';

// La consigne est floue sur les redirection, je redirige donc vers le login les utilisateurs non connectés meme sur index
if (!isset($_SESSION['login'])){
    header("Location:login.php");
}


if (isset($_GET['add_to_cart'])) {
    $cookie = $_GET['add_to_cart'];
    if (isset($_SESSION['cookies'][$cookie])) {
        $_SESSION['cookies'][$cookie]++;
    } else {
        $_SESSION['cookies'][$cookie] = 1;
    }
}


?>
<section class="cookies container-fluid">
    <div class="row">
        <?php foreach ($catalog as $id => $cookie) { ?>
            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                <figure class="thumbnail text-center">
                    <img src="assets/img/product-<?= $id; ?>.jpg" alt="<?= $cookie['name']; ?>" class="img-responsive">
                    <figcaption class="caption">
                        <h3><?= $cookie['name']; ?></h3>
                        <p><?= $cookie['description']; ?></p>
                        <a href="?add_to_cart=<?= $id; ?>" class="btn btn-primary">
                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Add to cart
                        </a>
                        <span>(<?php
                            if (isset($_SESSION['cookies'][$id])) {
                                echo $_SESSION['cookies'][$id];
                            } else {
                                echo "0";
                            }

                            ?>) in cart</span>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
