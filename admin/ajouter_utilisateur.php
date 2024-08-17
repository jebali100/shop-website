<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Ajouter utilisateur</title>
</head>
<body>

<?php
    require '../include/nav_admin.php';
?>



<div class="container py-2">
    <h3>Ajouter <span>Utilisateur</span></h3>
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
            header('location: utilisateur.php');
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

        <input type="submit" value="Ajouter Utilisateur" class="btn btn-primary my-2" name="ajouter">
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