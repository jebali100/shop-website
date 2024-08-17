<?php
foreach ($produits as $produit) {
    $idProduit = $produit->id;
    ?>
    <div class="col-md-4 mb-3">
        <div class="card h-100">

            <?php if (!empty($produit->discount)): ?>
                <span class="badge rounded-pill text-bg-warning w-25 position-absolute m-2" style="right:0"> - <?= $produit->discount ?> <i
                            class="fa fa-percent"></i></span>
            <?php endif; ?>

            <img class="card-img-top w-75 mx-auto" src="../upload/produit/<?= $produit->image ?>"
                 alt="Card image cap">
            <div class="card-body">
                <a href="produit.php?id=<?php echo $idProduit ?>" class="btn stretched-link"></a>
                <h5 class="card-title"><?= $produit->libelle ?></h5>
                <p class="card-text"><?= $produit->description ?></p>
                <p class="card-text"><small class="text-muted">Ajouté le
                        : <?= date_format(date_create($produit->date_creation), 'Y/m/d') ?></small></p>
            </div>
            <div class="card-footer bg-white" style="z-index: 10">
                <?php if (!empty($produit->discount)): ?>
                    <div class="h5"><span
                                class="badge rounded-pill text-bg-danger"><strike> <?= $produit->prix ?></strike> <i
                                    class="fa fa-solid fa-dollar"></i></span></div>
                    <div class="h5"><span
                                class="badge rounded-pill text-bg-success">Solde : <?= calculerRemise($produit->prix, $produit->discount) ?> <i
                                    class="fa fa-solid fa-dollar"></i></span></div>
                <?php else: ?>
                    <div class="h5"><span class="badge rounded-pill text-bg-success"><?= $produit->prix ?> <i
                                    class="fa fa-solid fa-dollar"></i></span></div>

                <?php endif; ?>


                <?php include '../include/front/counter.php' ?>
            </div>
        </div>
    </div>
    <?php
}
if (empty($produits)) {
    ?>
    <div class="alert alert-info" role="alert">
        Pas de produits pour l'instant
    </div>

    <?php
}
?>

<style>
    .card {
        border: none; /* Supprime la bordure de la carte */
        border-radius: 10px; /* Coins arrondis de la carte */
        box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); /* Ombre légère */
        transition: box-shadow 0.3s ease; /* Ajoute une transition douce à l'ombre */
    }

    .card:hover {
        box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2); /* Ombre légère plus prononcée au survol */
    }

    .card-title {
        font-size: 1.2rem; /* Taille du titre de la carte */
        font-weight: bold;
        color: #007bff; /* Couleur du titre de la carte en bleu */
    }

    .card-text {
        font-size: 1rem; /* Taille du texte de la carte */
        color: #555; /* Couleur du texte en gris foncé */
    }

    .card-footer {
        background-color: #fff; /* Couleur de fond du pied de carte */
        border-top: none; /* Supprime la bordure supérieure du pied de carte */
    }

    .badge {
        font-size: 0.9rem; /* Taille des badges */
        padding: 0.5rem 1rem; /* Rembourrage des badges */
    }
</style>
