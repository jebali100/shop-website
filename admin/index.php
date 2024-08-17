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
                header('location: admin.php');
            } else {
                ?>
                <div class="alert alert-danger" role="alert">
                    Vous n'etes pas inviter a cet espace.
                </div>

                <?php
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



<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Connexion</title>
</head>
<body>



<div class="container py-2">
<style>

    h3{
        margin-top: 40px;
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

    <h3>Espace<span>Admin</span></h3>
    <form method="POST" >
        <label for="login" class="form-label">Login</label>
        <input type="text" class="form-control" name="login" id="login">

        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">

        <input type="submit" value="Connexion" class="btn btn-primary my-2" name="connexion">

    </form>
</div>
</body>
</html>