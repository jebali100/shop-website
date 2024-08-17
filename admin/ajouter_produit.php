<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Ajouter produit</title>
</head>
<body>


<?php
    require '../include/nav_admin.php';
    require_once'../include/database.php';
?>


<div class="container py-2">
    <h3>Ajouter <span>Produit</span></h3>
    <?php
    if (isset($_POST['ajouter'])) {
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $discount = $_POST['discount'];
        $categorie = $_POST['categorie'];
        $description = $_POST['description'];
        $date = date('Y-m-d');

        $filename = 'produit.png';
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $tmp_name = $_FILES['image']['tmp_name'];
        $filename = uniqid() . $image;
        move_uploaded_file($tmp_name, '../upload/produit/' . $filename);
    } else {
        // Affiche une erreur si le fichier n'a pas été téléchargé correctement
        echo "Erreur lors du téléchargement de l'image: " . $_FILES['image']['error'];
    }
        if (!empty($libelle) && !empty($prix) && !empty($categorie)) {
            $sqlState = $pdo->prepare('INSERT INTO produit VALUES (null,?,?,?,?,?,?,?)');
            $inserted = $sqlState->execute([$libelle, $prix, $discount, $categorie, $date, $description, $filename]);
            if ($inserted) {
                header('location: produits.php');
            } else {

                ?>
                <div class="alert alert-danger" role="alert">
                    Database error .
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , prix et catégorie sont obligatoires.
            </div>
            <?php
        }

    }
    ?>
    <form method="post" enctype="multipart/form-data">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle">

        <label class="form-label">Prix</label>
        <input type="number" class="form-control" step="0.1" name="prix" min="0">

        <label class="form-label">Discount</label>
        <input type="number" step="0.1" value="0" class="form-control" name="discount" min="0" max="90">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"></textarea>

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">

        <?php
            $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label class="form-label">Catégorie</label>
        <select name="categorie" class="form-control">
            <option value="">Choisissez une catégorie</option>
            <?php
            foreach ($categories as $categorie) {
                echo "<option value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>";
            }
            ?>
        </select>


        <input type="submit" value="Ajouter produit" class="btn btn-primary my-2" name="ajouter">
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