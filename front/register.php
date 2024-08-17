<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Inscrivez-vous</title>
</head>
<body>


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
                    <a class="nav-link"
                       aria-current="page" href="index.php"><i class="fa-solid fa-home"></i> Accueil</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link"
                       aria-current="page" href="about.php"><i class="fa-solid fa-lightbulb"></i></i> Savoir plus</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link "
                           href="connexion.php"><i class="fa-solid fa-arrow-right-to-bracket"></i> Connexion</a>
                    </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container py-2">
    <h3>Inscrivez-<span>Vous</span></h3>
    <?php
    if (isset($_POST['ajouter'])) {
        $login = $_POST['login'];
        $pwd = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        if (!empty($login) && !empty($pwd) && !empty($nom) && !empty($prenom) ) {
            require_once '../include/database.php';
            $date = date('Y-m-d');
            $sqlState = $pdo->prepare('INSERT INTO utilisateur VALUES(null,?,?,?,?,?)'); // preparer une requete pour l insertion a la base de données
            $sqlState->execute([$login, $pwd, $date, $nom, $prenom]); // changer les ? par les valeurs entrées
            // Redirection
            header('location: connexion.php');
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Veuillez remplir tous les champs !
            </div>
            <?php
        }

    }
    ?>
    <form method="post" autocomplete="off">

        <label class="form-label">Nom</label>
        <input type="text" class="form-control" name="nom">

        <label class="form-label">Prénom</label>
        <input type="text" class="form-control" name="prenom">

        <label class="form-label">Login</label>
        <input type="text" class="form-control" name="login">

        <label class="form-label">Password</label>
        <input type="password" class="form-control" name="password">

        <input type="submit" value="inscriver-vous" class="btn btn-primary my-2" name="ajouter">
    </form>
</div>

<style>
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