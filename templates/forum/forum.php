<section class="forum-container">
    <button id="toggleButton" class="toggleButton">+</button>
    <h1>Forum</h1>
    <form id="myForm" class="ajout-pub" action="/forum" method="post">
        <h2>Ajouter une publication</h2>
        <input type="text" name="titre" maxlength="50" placeholder="Titre de publication">
        <textarea name="message" maxlength="255" style="resize: none;" placeholder="Contenu de la publication" rows="4"
            cols="50"></textarea>
        <input type="submit" class="submit" value="Publier">
    </form>
    <h2>Toutes les publications</h2>

    <?php
    $publications = $data['publications'];
    foreach ($publications as $publication) { ?>
    <article class="pub">
        <a href="/forum?id=<?= $publication->id_post ?>">
            <h2><?= $publication->titre_post ?></h2>
        </a>
        <p><?= $publication->message ?></p>
        <p class="auteur">publié le <?= $publication->publication ?> par <?= $publication->nom ?></p>
        <span><strong><a href="/forum?id=<?= $publication->id_post ?>">Voir la publication</a></strong>
            <?php
                if (isset($_SESSION['user'])) {
                    $userRole = $_SESSION['user']['titre_role'];
                    $userId = $_SESSION['user']['id_user'];
                    if ($userRole === 'admin' || $userId == $publication->id_user) { ?>
            | <a href="/forum/supprimer?id=<?= $publication->id_post ?>&comments=0">supprimer</a>
            <?php }
                }
                ?>
        </span>

    </article>
    <?php } ?>
    <script src="/javascripts/show.js"></script>
</section>