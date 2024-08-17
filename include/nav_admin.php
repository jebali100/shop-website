<?php
session_start();

?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../upload\produit\eshop.png" width="70 px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link "
                       aria-current="page" href="admin.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>

               
                    <li class="nav-item">
                        <a class="nav-link "
                           aria-current="page" href="utilisateur.php"><i
                                    class="fa-solid fa-user-plus"></i> Utilisateurs</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link "
                           aria-current="page" href="categories.php"><i
                                    class="fa-brands fa-dropbox"></i> Liste des catégories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           aria-current="page" href="produits.php"><i class="fa-solid fa-tag"></i>
                            Liste des produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           aria-current="page" href="commandes.php"><i
                                    class="fa-solid fa-barcode"></i> Commandes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="deconnexion.php"><i
                                    class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                    </li>


            </ul>
        </div>
    </div>
</nav>