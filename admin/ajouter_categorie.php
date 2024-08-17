<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Ajouter catégorie</title>
</head>
<body>

<?php
    require '../include/nav_admin.php';
?>


<div class="container py-2">
    <h3>Ajouter <span>Catégories</span></h3>
    <?php
        if(isset($_POST['ajouter'])){
            $libelle = $_POST['libelle'];
            $description = $_POST['description'];
            $icone = $_POST['icone'];

            if(!empty($libelle) && !empty($description)){
                require_once '../include/database.php';
                $sqlState = $pdo->prepare('INSERT INTO categorie(libelle,description,icone) VALUES(?,?,?)');
                $sqlState->execute([$libelle,$description,$icone]);
                header('location: categories.php');
            }else{
                ?>
                <div class="alert alert-danger" role="alert">
                    Libelle et description sont obligatoires
                </div>
                <?php
            }
        }
    ?>
    <form method="post">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" ></textarea>

        <label class="form-label">Icône</label>
        <input type="text" class="form-control" name="icone">

        <input type="submit" value="Ajouter catégorie" class="btn btn-primary my-2" name="ajouter">
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