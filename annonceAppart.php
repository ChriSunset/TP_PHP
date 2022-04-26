<?php require_once('inc/header.inc.php');
require_once('inc/init.php');


if (!isset($_GET['id']) /*|| !ctype_digit($_GET['id'])*/ || $_GET['id'] < 1) {

    header('location:listAppart.php');
}

// Si tous les champs ont étés remplis, vérification si les champs respectent les formats et caractères demandés.
if ($_POST) {

    if (!isset($_POST['reservation_message']) || iconv_strlen($_POST['reservation_message']) < 3 || iconv_strlen($_POST['reservation_message']) > 200) {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format message !</div>';
    }

    // Si absence d'erreur, alors on met à jour les données dans le champ 'reservation_message' via une requête préparée
    if (empty($erreur)) {

        $ajoutMessage = $pdo->prepare("UPDATE advert SET id = :id, reservation_message = :reservation_message WHERE id = :id ");

        $ajoutMessage->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $ajoutMessage->bindValue(':reservation_message', $_POST['reservation_message'], PDO::PARAM_STR);

        $ajoutMessage->execute();
    }
}

$afficheInfos = $pdo->query("SELECT * FROM advert WHERE id = $_GET[id] ");

// Récupération des infos d'appart dans une variable $information
$information = $afficheInfos->fetch(PDO::FETCH_ASSOC);
?>

<h1 class="text-center text-danger my-5">Appartement <?= $information['title'] ?> en <?= $information['type'] ?></h1>

<?= $erreur ?>

<a href="listAppart.php"><button class="btn btn-outline-danger">Retour à la liste des appartements</button></a>
<hr>

<!-- Affichage des infos sur l'appartement dans un tableau  -->
<div class="card col-md-6 my-5 border border-warning text-center bg-secondary bg-opacity-50">
    <div class="card-header">

        L'appartement <?= $information['title'] ?> est disponible à <?= $information['city'] ?> (code postal: <?= $information['postal_code'] ?>)
    </div>

    <div class="card-header">

        Sa description est la suivante : <?= $information['description'] ?>
    </div>
    <div class="card-body">
        <h5 class="card-title">Cet appartement est proposé à la <?= $information['type'] ?> au prix de
            <!-- Affichage du prix qui différe selon le type d'acquisition -->
            <?php if ($information['type'] == 'vente' || $information['type'] == 'achat') {
                echo $information['price'] . " €";
            } else {
                echo $information['price'] . " €/j";
            }
            ?>

        </h5>
        <p class="card-text"></p>
    </div>
    <div class="card-footer text-muted">

    </div>
    <!-- Ce message s'affiche si personne n'a reservé l"appartement en question  -->
    <?php if (empty($information['reservation_message'])) { ?>
        <p>
            <strong>
                Cet appartement n'est pas réservé ! Soyez les premiers à laisser un message afin que le propriétaire vous recontacte.
            </strong>

        <form class="mx-5" action="" method="post">

            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <div class="form-group">
                <label for="reservation_message">Message de réservation</label>
                <textarea name="reservation_message" id="reservation_message" rows="5" class="form-control" placeholder="Donnez un maximum de coordonnées pour que le propriétaire vous recontacte !"></textarea>
            </div>

            <button class="btn btn-outline-danger mt-3">Je réserve cet appartement !</button>
        </form>
        </p>
        <!-- Ce message s'affiche si quelqu'un reservé l"appartement en question  -->
    <?php } else { ?>
        <div class="alert alert-warning">
            <p>
                Cet appartement a été reservé, voici le message du futur locataire :
                <hr>
                <em><?= $information['reservation_message'] ?></em>
            </p>
        </div>
    <?php } ?>
</div>

<?php require_once('inc/footer.inc.php');
