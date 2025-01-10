<?php
$publication = $data['publication'];
$commentaires = $data['comments'];
?>
<a href="/forum" class="retour">
    <h2>retour au Forum</h2>
</a>
<section class="publication-container">
    <div class="publication">
        <h2><?= $publication['titre_post'] ?></h2>
        <p><?= $publication['message'] ?></p>
        <p class="auteur">publié le <?= $publication['publication'] ?> par <?= $publication['nom'] ?></p>
    </div>

    <form class="ajout-com" action="/forum?id=<?= $publication['id_post'] ?>" method="post">
        <input type="hidden" name="parent" value="<?= $publication['id_post'] ?>">
        <input name="message" maxlength="255" placeholder="Commenter la publication" required></input>
        <input type="submit" class="submit" value="Commenter">
    </form>
    <?php

    foreach ($commentaires as $comment) {
        ?>
    <article class="commentaire">
        <p><?= $comment->message ?></p>
        <p class="auteur">par <?= $comment->nom ?></p>
        <?php
            if (isset($_SESSION['user'])) {
                $userRole = $_SESSION['user']['titre_role'];
                $userId = $_SESSION['user']['id_user'];
                if ($userRole === 'admin' || $userId == $publication->id_user) { ?>
        <a href="/forum/supprimer?id=<?= $comment->id_post ?>&comments=<?= $publication['id_post'] ?>">supprimer</a>
        <?php }
            }
            ?>
    </article>
    <?php

    }
    ?>
</section>