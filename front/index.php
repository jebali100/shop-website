<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head_front.php' ?>
    <title>Accueil</title>
</head>
<body>

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
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == '/ecommerce/index.php') echo 'active' ?>"
                       aria-current="page" href="index.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php if ($currentPage == '/ecommerce/index.php') echo 'active' ?>"
                       aria-current="page" href="about.php"><i class="fa-solid fa-lightbulb"></i></i> Savoir plus</a>
                </li>

    

                    <?php
                    session_start();
                    $connecte = false;
                    if (isset($_SESSION['utilisateur'])) {
                        $connecte = true;
                    }

                if ($connecte) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="deconnexion.php"><i
                            class="fa-solid fa-right-from-bracket"></i> Déconnexion</a>
                    </li>

                    <a class="btn float-end" href="panier.php" ><i class="fa-solid fa-cart-shopping"></i> Panier </a>

                    <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/ecommerce/connexion.php') echo 'active' ?>"
                           href="connexion.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Connexion</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>


    </div>
</nav>




<div class="container py-2">
    <?php
    require_once '../include/database.php';
    $categoryId = $_GET['id'] ?? NULL;
    $categories = $pdo->query("SELECT * FROM categorie")->fetchAll(PDO::FETCH_OBJ);
    if (!is_null($categoryId)) {
        $sqlState = $pdo->prepare("SELECT * FROM produit WHERE id_categorie=? ORDER BY date_creation DESC");
        $sqlState->execute([$categoryId]);
        $produits = $sqlState->fetchAll(PDO::FETCH_OBJ);
    } else {
        $produits = $pdo->query("SELECT * FROM produit ORDER BY date_creation DESC")->fetchAll(PDO::FETCH_OBJ);
    }
    $activeClasses = 'active bg-success rounded border-success';
    ?>

    
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group list-group-flush position-sticky sticky-top">
                    <h4 class=" mt-4"><i class="fa fa-light fa-list"></i> Liste des catégories</h4>
                    <li class="list-group-item <?= $categoryId == NULL ? $activeClasses : '' ?>">
                        <a class="btn btn-default w-100" href="./">
                            <i class="fa fa-solid fa-border-all"></i> Voir tout les produits
                        </a>
                    </li>
                    <?php
                    foreach ($categories as $categorie) {
                        $active = $categoryId === $categorie->id ? $activeClasses : '';
                        ?>
                        <li class="list-group-item <?= $active ?>">
                            <a class="btn btn-light w-100"
                               href="index.php?id=<?php echo $categorie->id ?>">
                                <i class="fa <?php echo $categorie->icone ?>"></i> <?php echo $categorie->libelle ?>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="col mt-4">
                <div class="row">
                    <?php require_once '../include/front/product/afficher_product.php'; ?>
                </div>
            </div>
        </div>
    </div>

</div>
<style>

.col-md-3 {
    background-color: #f8f9fa;
    border: 1px solid #ccc;
    border-radius: 5px;
    padding: 15px;
}

h4 {
    font-size: 18px;
    margin-bottom: 15px;
}


.list-group-item {
    border: none;
    padding: 10px 0;
    transition: all 0.3s ease;
}


.list-group-item a {
    text-decoration: none;
    font-weight: bold;
}


.list-group-item:hover a {
    color: white;
}

.btn:hover {
    background-color: #28a745;
}


</style>
</style>
</body>
</html>