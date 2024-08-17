<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Connexion</title>
</head>
<body>



<?php
session_start();
$connecte = false;
if (isset($_SESSION['utilisateur'])) {
    $connecte = true;
}

?>
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#"><img src="../upload\produit\eshop.png" width="70 px"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?php
        $currentPage = $_SERVER['PHP_SELF'];
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
                    <li class="nav-item">
                        <a class="nav-link <?php if ($currentPage == '/ecommerce/connexion.php') echo 'active' ?>"
                           href="connexion.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Connexion</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>






<div class="container py-2">
<?php
if(isset($_POST['connexion'])){
    $login = $_POST['login'];
    $pwd   = $_POST['password'];

    if(!empty($login) && !empty($pwd)){
        require_once '../include/database.php';
        $sqlState = $pdo->prepare('SELECT * FROM utilisateur WHERE login=? AND password=?');
        $sqlState->execute([$login,$pwd]);

        if($sqlState->rowCount() >= 1){
            $user = $sqlState->fetch();
            $_SESSION['utilisateur'] = $user;

            if ($login === "admin" && $pwd === "admin") {
                // Rediriger l'administrateur vers admin.php
                header('location: admin/admin.php');
            } else {
                // Rediriger l'utilisateur vers home.php
                header('location: index.php');
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Login ou mot de passe incorrect.
            </div>
            <?php
        }
    } else {
        ?>
        <div class="alert alert-danger" role="alert">
            Login et mot de passe sont obligatoires.
        </div>
        <?php
    }
}
    ?>
    <h3>Connexion</h3>
    <form method="post">
        <label class="form-label"><h6>Login</h6></label>
        <input type="text" class="form-control" name="login">

        <label class="form-label"><h6>Password</h6></label>
        <input type="password" class="form-control" name="password">

        <input type="submit" value="Connexion" class="btn btn-primary my-2" name="connexion">

        <div class="card">
        <div class="card-header">
            Inscription
        </div>
        <div class="card-body">
            <h5 class="card-title">Vous n'avez pas du compte ? </h5>
            <p class="card-text">Inscrivez-vous pour pouvoir compléter des achats veuillez vous inscriver</p>
            <?php 
                if(isset($_POST['inscrire'])){
                    header('location: register.php');
                }
            ?><input type="submit" value="Inscrivez-vous" class="btn btn-primary my-2" name="inscrire">
        </div>
        </div>
        
    </form>
</div>


<style>
    h3{
        margin-top: 30px;
    }
    h3, h2 {
        color: #007bff; /* Couleur du texte en bleu */
        font-family: Arial, sans-serif; /* Police de caractères */
        font-size: 24px; /* Taille de la police */
        font-weight: bold; /* Gras */
        text-align: left; /* Alignement du texte à gauche */
        margin-bottom: 20px; /* Marge en bas pour ajouter de l'espace */
        margin-left: 200px; /* Décalage vers la droite */
    }

    span {
        color: aliceblue;
        background: linear-gradient(to right, #007bff, #0056b3); /* Dégradé linéaire de bleu */
    }
</style>



</body>
</html>