<?php
$publication = $data['publication'];
$commentaires = $data['comments'];
dump($commentaires);
?>
<section class="publication-container">
    <div class="publication">
            <h2><?= $publication['titre_post'] ?></h2>
            <p><?= $publication['message'] ?></p>
            <p class="auteur">publié le <?= $publication['publication'] ?> par <?= $publication['nom'] ?></p>
    </div>

<form class="ajout-com" action="/forum?id=<?= $publication['id_post'] ?>" method="post">
    <input type="hidden" name="parent" value="<?= $publication['id_post'] ?>">
    <textarea name="message" maxlength="255" style="resize: none;" placeholder="Commenter la publication" rows="4"
            cols="50"></textarea>
    <input type="submit" class="submit" value="Commenter">
</form>
<?php

foreach ($commentaires as $comment) {
    ?>
    <article class="commentaire">
        <p><?= $comment->message ?></p>
        <p class="auteur">par <?= $comment->nom ?></p>
    </article>
    <?php
}
?>
</section>
