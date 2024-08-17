<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet"
        type="text/css">
    <script src="https://code.jquery.com/jquery-3.6.1.js"crossorigin="" ></script>
    <script src="../assets/js/produit/counter.js"  defer='defer'></script>
    <link rel="icon" type="image/png" sizes="32x32" href="assets\favicon\eshop.png">
    <title>About Us</title>
</head>

<style>
    h1,h2, h3, h4 {
    font-weight: 900;
    }
    h5, h6,a,p{
    font-weight: 300;
    }
    :root {
    --colorOne: #19456b;
    --colorTwo: #16c79a;
    }
    .center-vertical {
    display: flex;
    width: 100%;
    min-height: 100vh;
    align-items: center;
    }
    .about-us-section {
    width: 100%;
    padding: calc(5% + 30px) 0px;
    }
    .about-us-section{
        width:100% ;
        padding: calc(5% + 30px) 0px;
    }
    .about-us-section .img-head {
        position: relative;
        overflow: hidden;
    }
    .about-us-section .img-head img {
        width: 100%;
        transition: transform .35;
    }
    .about-us-section .img-head:hover img {
        transform: scale(1.2);
    }
    .about-us-section .img-head::after {
        content:"";
        width: 100%;
        height: 100%;
        background-image: linear-gradient(to right bottom, var(--colorOne), var(--colorTwo));
        position: absolute;
        left: 0;
        top:0;
        opacity: .5;
    }
    .about-us-section .break-small { 
        width: 80px; 
        height: 3px;
        background-color: var(--color Two); }
    .about-us-section .text-para { 
        font-size: 16px; 
        color: #444; }
    .about-us-section .box {
        background-color: var(--colorTwo); 
        color: #fff;
        text-align: center;
        padding: 20px 0px; 
        position: relative; 
        overflow: hidden;
        }
    .about-us-section .box i { 
        font-size: 42px;
        } 
    .about-us-section .box h4 { 
        font-size: 14px;
        }
    .about-us-section .box p {
        font-size: 22px;
    }
    .about-us-section .box::after,
    .about-us-section .box::before{
        content: "";
        position: absolute;
        width: 100px;
        height: 100;
        background-color: #fff;
        border-radius: 50%;
        transition: transform .3s;
    }
    .about-us-section .box::after{
        left: -50px;
        top: -50px;
    }
    .about-us-section .box::before{
        right: -50px;
        bottom: -50px;
    }
    .about-us-section .box:hover::after,
    .about-us-section .box:hover::before{
        transform: scale(1.2);
    }
    


</style>

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


<div class="center-vertical bg-dark">
    <div class="about-us-section bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 mb-4 mb-lg-0">
                    <div class="img-head">
                        <img src="../assets/favicon/Internet-1.jpg">
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <h2 class="text-head">
                        À propos de Nous
                    </h2>
                <div class="break-small mb-2"></div>
                    Bienvenue chez ESHOP, votre nouvel espace préféré pour découvrir et acheter une variété de produits pour tous les aspects de votre vie. <br><br>
                    Que vous cherchiez les derniers gadgets, des vêtements à la mode, ou tout pour embellir votre maison, nous avons quelque chose pour chacun.<br><br>
                    Notre Voyage : Né d'une petite idée en 2023 , nous avons grandi grâce à notre passion pour vous offrir le meilleur. Chaque article dans notre magasin est choisi avec soin et pensé pour vous apporter satisfaction et joie.<br><br>
                    Notre Promesse : Vous proposer des produits de qualité à des prix justes. Votre bonheur est notre but ultime, et nous travaillons dur chaque jour pour nous assurer que vous trouvez exactement ce que vous cherchez.<br><br>
                    Service de Confiance : Nous mettons un point d'honneur à ce que votre expérience chez nous soit simple et agréable. Si vous avez besoin d'aide, nous sommes juste à un clic ou un appel de distance.<br><br>
                    Merci de nous choisir pour accompagner votre quotidien. Nous sommes ravis de faire partie de votre vie et nous nous réjouissons de construire ensemble de beaux souvenirs.<br><br>
        <div class="row">
            <div class="col-12 col-md-4 mb-2 mb-md-8">
                <div class="box">
                    <i class="fa fa-users mb-3"></i>
                    <h4 class="mb-0">TOTAL CLIENTS</h4>
                    <p class="mb-0">1200</p>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-2 mb-md-8">
                <div class="box">
                    <i class="fa-solid fa-box"></i></i>
                    <h4 class="mb-0">TOTAL PRODUITS</h4>
                    <p class="mb-0">+999</p>
                </div>
            </div>

            <div class="col-12 col-md-4 mb-2 mb-md-8">
                <div class="box">
                    <i class="fa-solid fa-truck-fast"></i>
                    <h4 class="mb-0">TOTAL COMMANDES</h4>
                    <p class="mb-0">+999</p>
                </div>
            </div>
            
        </div>
    </div>
</div>
</body>
</html>