<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Modifier produit</title>
</head>
<body>
<?php
require_once '../include/database.php';
require '../include/nav_admin.php';
?>


<div class="container py-2">
    <h3>Modifier <span>Produit</span></h3>

<?php

$id = $_GET['id'];
require_once '../include/database.php';
$sqlState = $pdo->prepare('SELECT * from produit WHERE id=?');
$sqlState->execute([$id]);
$produit = $sqlState->fetch(PDO::FETCH_OBJ);

if (isset($_POST['modifier'])) {
    $libelle = $_POST['libelle'];
    $prix = $_POST['prix'];
    $discount = $_POST['discount'];
    $categorie = $_POST['categorie'];
    $description = $_POST['description'];

    // Initialise filename avec l'ancienne image au cas où aucune nouvelle image n'est téléchargée
    $filename = $produit->image;

    // Vérifie si une nouvelle image a été téléchargée
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image = $_FILES['image']['name'];
        $filename = uniqid() . $image;
        move_uploaded_file($_FILES['image']['tmp_name'], '../upload/produit/' . $filename);
        
        // Si une nouvelle image est téléchargée, supprimez l'ancienne image du serveur
        if (file_exists('../upload/produit/' . $produit->image) && $produit->image != 'produit.png') {
            unlink('../upload/produit/' . $produit->image);
        }
    }

    // Préparez et exécutez la requête SQL pour la mise à jour
    $query = "UPDATE produit SET libelle=?, prix=?, discount=?, id_categorie=?, description=?, image=? WHERE id=?";
    $sqlState = $pdo->prepare($query);
    $updated = $sqlState->execute([$libelle, $prix, $discount, $categorie, $description, $filename, $id]);

    if ($updated) {
        // Redirect after updating the product
        header('location: produits.php');
        exit;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Erreur de la base de données lors de la mise à jour du produit.</div>";
    }
}
?>
    <form method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $produit->id ?>">
        <label class="form-label">Libelle</label>
        <input type="text" class="form-control" name="libelle" value="<?= $produit->libelle ?>">

        <label class="form-label">Prix</label>
        <input type="number" class="form-control" step="0.1" name="prix" min="0" value="<?= $produit->prix ?>">

        <label class="form-label">Discount</label>
        <input type="numbre" step="0.1" value="0" class="form-control" name="discount" min="0" max="90"
               value="<?= $produit->discount ?>">

        <label class="form-label">Description</label>
        <textarea class="form-control" name="description"><?= $produit->description ?></textarea>

        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="image">
        <img width="250" class="img img-fluid" src="upload/produit/<?= $produit->image ?>"><br>
        <?php

        ?>

        <?php
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <label class="form-label">Catégorie</label>
        <select name="categorie" class="form-control">
            <option value="">Choisissez une catégorie</option>
            <?php
            foreach ($categories as $categorie) {
                $selected = $produit->id_categorie == $categorie['id'] ? ' selected ' : '';
                echo "<option $selected value='" . $categorie['id'] . "'>" . $categorie['libelle'] . "</option>";
            }
            ?>
        </select>
        <input type="submit" value="Modifier produit" class="btn btn-primary my-2" name="modifier">
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