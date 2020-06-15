<?php
session_start();
require 'inc/head.php';
require 'inc/data/products.php';

if (!isset($_SESSION['login'])){
    header("Location:login.php");
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
                        <span>YOU GOT
                            <?php
                            if (isset($_SESSION['cookies'][$id])) {
                                echo $_SESSION['cookies'][$id];
                            } else {
                                echo "NONE";
                            }

                            ?> OF THESES !</span>
                    </figcaption>
                </figure>
            </div>
        <?php } ?>
    </div>
</section>
<?php require 'inc/foot.php'; ?>
