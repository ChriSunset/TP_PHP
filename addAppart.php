<?php require_once('inc/header.inc.php');
require_once('inc/init.php');



if ($_POST) {
    // LE champ titre ne doit pas faire moins de 3 caracteres et plus de 20 caractères
    if (!isset($_POST['title']) || iconv_strlen($_POST['title']) <= 3 || iconv_strlen($_POST['title']) > 20) {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format titre !</div>';
    }

    // LE champ description ne doit pas faire moins de 3 caracteres et plus de 200 caractères
    if (!isset($_POST['description']) || iconv_strlen($_POST['description']) <= 3 || iconv_strlen($_POST['description']) > 200) {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format description !</div>';
    }

    // Le code postal ne comportant que 5 caractères et seulement des chiffres, on exclut les autres types de caractères.
    if (!isset($_POST['postal_code']) || !preg_match("#^[0-9]{5}$#", $_POST['postal_code'])) {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format code postal !</div>';
    }

    // LE champ city ne doit pas faire moins de 3 caracteres et plus de 30 caractères
    if (!isset($_POST['city']) || iconv_strlen($_POST['city']) <= 2 || iconv_strlen($_POST['city']) > 30) {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format ville !</div>';
    }

    // Le prix ne comportant que 7 caractères et seulement des chiffres, on exclut les autres types de caractères.
    if (!isset($_POST['price']) || !preg_match("#^[0-9]{1,7}$#", $_POST['price'])) {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format prix !</div>';
    }

    // On amène l'utilisateur à faire un choix impératif entre les trois types d'acquisition d'un appartement.
    if (!isset($_POST['type']) || $_POST['type']  != 'location' &&  $_POST['type'] != 'vente' && $_POST['type'] != 'achat') {
        $erreur .= '<div class="alert alert-danger" role="alert">Erreur format type !</div>';
    }

    // Si tous les champs ont été renseignés et si aucun message d'erreur n'a été généré, $erreur reste vide et execute les instructions suivantes
    if (empty($erreur)) {
        // On utilise une requête préparé pour sécuriser la transmission des données saisies 
        $ajoutAppart = $pdo->prepare("INSERT INTO advert (title, description, postal_code, city, price, type) VALUES (:title, :description, :postal_code, :city, :price, :type)");

        $ajoutAppart->bindValue(':title', $_POST['title'], PDO::PARAM_STR);
        $ajoutAppart->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
        $ajoutAppart->bindValue(':postal_code', $_POST['postal_code'], PDO::PARAM_INT);
        $ajoutAppart->bindValue(':city', $_POST['city'], PDO::PARAM_STR);
        $ajoutAppart->bindValue(':price', $_POST['price'], PDO::PARAM_INT);
        $ajoutAppart->bindValue(':type', $_POST['type'], PDO::PARAM_STR);

        $ajoutAppart->execute();

        $content .= '<div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
            <strong>Félicitations !</strong> Ajout d\'un nouvel appartement réussi !
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>';
    }
}

?>
<!-- Formulaire pour inscrire les infos d'un nouvel appartement  -->

<h1 class="text-center text-danger my-5">Ajouter une annonce</h1>

<?= $content ?>
<?= $erreur ?>

<form class="col-md-8 mb-5" method="post" action="">
    <p class="mb-2">* Champs obligatoires</p>
    <div class="form-group my-2">
        <label for="title">Titre *</label>

        <input id="title" name="title" type="text" class="form-control" placeholder="" required value="">
    </div>

    <div class="form-group my-2">
        <label for="description">Description *</label>
        <textarea id="description" name="description" id="" cols="30" rows="5" class="form-control" placeholder="Une description précise de l'appartement !" required></textarea>
    </div>

    <div class="form-group my-2">
        <label for="postal_code">Code postal *</label>
        <input id="postal_code" name="postal_code" type="text" class="form-control" placeholder="code postal" value="" required>
    </div>

    <div class="form-group my-2">
        <label for="city">Ville *</label>
        <input id="city" name="city" type="text" class="form-control" placeholder="Ville" value="" required>
    </div>

    <div class="form-group my-2">
        <label for="price">Prix *</label>
        <div class="input-group">
            <input id="price" name="price" type="price" class="form-control" placeholder="prix à la location/jour,prix d'achat ou prix de vente" required>
            <div class="input-group-append">
                <div class="input-group-text">€</div>
            </div>
        </div>
    </div>

    <div class="form-group my-2">
        <label for="type">Type *</label>
        <select name="type" id="type" class="form-control" required>
            <option value="location">Location</option>
            <option value="achat">Achat</option>
            <option value="vente">Vente</option>
        </select>
    </div>

    <button type="submit" class="btn btn-outline-danger mt-5">Créer une annonce</button>

</form>

<?php require_once('inc/footer.inc.php');
