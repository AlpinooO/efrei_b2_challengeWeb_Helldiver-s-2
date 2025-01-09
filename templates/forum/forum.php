<section class="forum-container">
    <h1>Forum</h1>
    <form class="ajout-pub" action="/forum" method="post">
        <input type="text" name="titre" maxlength="50" placeholder="Titre de publication">
        <textarea name="message" maxlength="255" style="resize: none;" placeholder="Contenu de la publication" rows="4"
            cols="50"></textarea>
        <input type="submit" class="submit" value="Publier">
    </form>
    <h2>Toutes les publications</h2>

    <?php
    $publications = $data['publications'];
    foreach ($publications as $publication) { ?>
        <article>
            <h2><?= $publication->titre_post ?></h2>
            <p><?= $publication->message ?></p>
            <p>publié le <?= $publication->publication ?> par <?= $publication->nom ?></p>
            <a href="/forum?id=<?= $publication->id_post ?>">Voir la publication</a>
            <?php
            if (isset($_SESSION['user'])) {
                $userRole = $_SESSION['user']['titre_role'];
                $userId = $_SESSION['user']['id_user'];
                if ($userRole === 'admin' || $userId == $publication->id_user) { ?>
                    <a href="/forum/supprimer?id=<?= $publication->id_post ?>">supprimer</a>
                <?php }
            }
            ?>

        </article>
    <?php } ?>
</section>