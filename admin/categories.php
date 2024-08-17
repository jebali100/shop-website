<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Liste des catégories</title>
</head>
<body>

<?php
    require '../include/nav_admin.php';
?>





<div class="container py-2">
    <h2>Liste des <span>Catégories</span></h2>
    <a href="ajouter_categorie.php" class="btn btn-primary">Ajouter catégorie</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>Libelle</th>
                <th>Description</th>
                <th>Icone</th>
                <th>Date de création</th>
                <th>Opérations</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once '../include/database.php';
        $categories = $pdo->query('SELECT * FROM categorie')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $categorie){
            ?>
            <tr>
                <td><?php echo $categorie['id'] ?></td>
                <td><?php echo $categorie['libelle'] ?></td>
                <td><?php echo $categorie['description'] ?></td>
                <td>
                    <i class="fa <?php echo $categorie['icone'] ?>"></i>
                </td>
                <td><?php echo $categorie['date_creation'] ?></td>
                <td>
                    <a href="modifier_categorie.php?id=<?php echo $categorie['id'] ?>" class="btn btn-primary">Modifier</a>
                    <a href="supprimer_categorie.php?id=<?php echo $categorie['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<style>
    h3,h2 {
    color: #007bff; /* Couleur du texte en bleu */
    font-family: Arial, sans-serif; /* Police de caractères */
    font-size: 24px; /* Taille de la police */
    font-weight: bold; /* Gras */
    text-align: center; /* Alignement du texte au centre */
    margin-bottom: 20px; /* Marge en bas pour ajouter de l'espace */
}
    span {
        color:aliceblue;
        background: linear-gradient(to right, #007bff, #0056b3); /* Dégradé linéaire de bleu */
    }


</style>

</body>
</html>