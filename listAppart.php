<?php require_once('inc/header.inc.php');
require_once('inc/init.php');

// Requête pour rechercher toutes les infos de tous les appartements dans la table advert par ordre decroissant
$afficheAppart = $pdo->query("SELECT * FROM advert ORDER BY id DESC");

?>

<h1 class="text-center text-danger my-5">Consultez toutes nos annonces</h1>

<!-- Affichage des résultats dans un tableau  -->
<table class="table table-dark table-striped">
    <thead>
        <tr>
            <th>Annonce</th>
            <th>Lieu</th>
            <th>Prix et type</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <!-- Récupération de ces infos dans une variable $appart dans une boucle while afin d'afficher en continu -->
        <?php while ($appart = $afficheAppart->fetch(PDO::FETCH_ASSOC)) : ?>
            <tr>
                <td>
                    <!-- Affichage des infos titre, description, code postal, prix et type d'acquisition  -->
                    <strong><?= strtoupper($appart['title']) ?></strong>
                    <p>
                        <small>
                            <?= $appart['description'] ?>
                        </small>
                    </p>
                </td>
                <td>
                    <?= $appart['postal_code'] . " " .   $appart['city'] ?>

                    <?php if (!empty($appart['reservation_message'])) : ?>
                        <span class="badge bg-success">Réservé !</span>
                    <?php endif ?>
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
                <td>
                    <a href="annonceAppart.php?id=<?= $appart['id'] ?>" class="btn btn-danger">Voir l'annonce</a>
                </td>
            </tr>
        <?php endwhile ?>
    </tbody>
</table>

<?php require_once('inc/footer.inc.php');
