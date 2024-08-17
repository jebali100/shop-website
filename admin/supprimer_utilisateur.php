<?php
require_once '../include/database.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Vérifier si l'utilisateur existe dans la base de données
    $query = "SELECT * FROM utilisateur WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si l'utilisateur existe, le supprimer
    if ($utilisateur) {
        $query = "DELETE FROM utilisateur WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            header('Location:utilisateur.php'); // Rediriger vers la page de liste des utilisateurs après la suppression
            exit();
        } else {
            echo 'Erreur lors de la suppression de l\'utilisateur.';
        }
    } else {
        echo 'Utilisateur non trouvé.';
    }
} else {
    echo 'ID d\'utilisateur non spécifié.';
}
?>
