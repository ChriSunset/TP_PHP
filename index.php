<?php
require_once('inc/header.inc.php');
require_once('inc/init.php');

// Requête pour rechercher toutes les infos des 15 appartements les plus récents dans la table 'advert' par ordre decroissant
$afficheAppart = $pdo->query("SELECT * FROM advert ORDER BY id DESC LIMIT 0,15");

?>

<div>
    <h1 class="text-center text-danger my-5">L'appartement idéal.com !</h1>
    <p class="lead">Vendez, achetez, louez un appartement facilement avec L'appartement idéal.com !</p>
    <hr class="my-5">
    <div class="row">
        <img src="img/appartement2.jpg" alt="appart">
    </div>
    <div class="row text-center mt-5">
        <p class="col-12">
            <a class="btn btn-outline-danger btn-lg me-5" href="addAppart.php" role="button">Ajouter une annonce !</a>
            <a class="btn btn-danger btn-lg ms-5" href="listAppart.php" role="button">Consulter toutes les annonces</a>
        </p>
    </div>
</div>

<h1 class="mt-5">Nos 15 dernières annonces ajoutées</h1>

<!-- Affichage des résultats dans un tableau  -->
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Annonce</th>
            <th>Code postal et Lieu</th>
            <th>Prix et type</th>
        </tr>
    </thead>
    <tbody>
        <!-- Récupération de ces infos dans une variable $appart dans une boucle while -->
        <?php while ($appart = $afficheAppart->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td>
                    <!-- Affichage des infos : titre, description, code postal, prix et type d'acquisition dont la palette de couleur varie -->
                    <strong><?= strtoupper($appart['title']) ?></strong>
                    <p>
                        <small>

                            <?= $appart['description'] ?>
                        </small>
                    </p>
                </td>
                <td>

                    <?= $appart['postal_code'] . " " .   $appart['city'] ?>
                </td>
                <td>
                    <?php if ($appart['type'] == 'Vente') : ?>
                        <span class="badge bg-success"><?= $appart['type'] ?></span>
                    <?php elseif ($appart['type'] == 'Location') : ?>
                        <span class="badge bg-info"><?= $appart['type'] ?></span>
                    <?php else : ?>
                        <span class="badge bg-danger"><?= $appart['type'] ?></span>
                    <?php endif ?>
                    <span class="badge bg-warning"><?= $appart['price'] ?></span>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>

<?php require_once('inc/footer.inc.php');
?>