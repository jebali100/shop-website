<!doctype html>
<html lang="en">
<head>
    <?php include '../include/head.php' ?>
    <title>Liste des utilisateurs</title>
</head>
<body>



<?php
    require '../include/nav_admin.php';
?>


<div class="container py-2">
    <h2>Liste des <span>Utilisateurs</span></h2>
    <a href="ajouter_utilisateur.php" class="btn btn-primary">Ajouter utilisateur</a>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>#ID</th>
                <th>nom</th>
                <th>prénom</th>
                <th>login</th>
                <th>password</th>
            </tr>
        </thead>
        <tbody>
        <?php
        require_once '../include/database.php';
        $utilisateurs = $pdo->query('SELECT * FROM utilisateur WHERE login <> "admin"')->fetchAll(PDO::FETCH_ASSOC);
        foreach ($utilisateurs as $utilisateur){
            ?>
            <tr>
                <td><?php echo $utilisateur['id'] ?></td>
                <td><?php echo $utilisateur['nom'] ?></td>
                <td><?php echo $utilisateur['prenom'] ?></td>
                <td><?php echo $utilisateur['login'] ?></td>
                <td><?php echo $utilisateur['password'] ?></td>
                <td>
                    
                    <a href="supprimer_utilisateur.php?id=<?php echo $utilisateur['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la utilisateur <?php echo $utilisateur['login'] ?>');" class="btn btn-danger">Supprimer</a>
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