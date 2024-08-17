<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarNav">
        </div>
        <?php
        $productCount = 0;
        if (isset($_SESSION['utilisateur'])) {
            $idUtilisateur = $_SESSION['utilisateur']['id'];
            $productCount = count($_SESSION['panier'][$idUtilisateur] ?? []);
        }
        function calculerRemise($prix, $discount)
        {
            return $prix - (($prix * $discount) / 100);
        }

        ?>
        <a class="btn float-end" href="../"><i</a>
        <a class="btn float-end" href="../front/index.php"><i class="fa-solid fa-cart-shopping"></i> Shop</a>
        <a class="btn float-end" href="panier.php"><i class="fa-solid fa-cart-shopping"></i> Panier
            (<?php echo $productCount; ?>)</a>
    </div>
</nav>