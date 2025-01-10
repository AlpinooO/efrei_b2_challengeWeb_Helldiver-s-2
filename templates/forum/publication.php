<?php
$publication = $data['publication'];
$commentaires = $data['comments'];
dump($commentaires);
?>
<article>
    <h2><?= $publication['titre_post'] ?></h2>
    <p><?= $publication['message'] ?></p>
    <p>publié le <?= $publication['publication'] ?> par <?= $publication['nom'] ?></p>
</article>
<form action="/forum?id=<?= $publication['id_post'] ?>" method="post">
    <input type="hidden" name="parent" value="<?= $publication['id_post'] ?>">
    <input type="text" name="message" placeholder="Votre commentaire">
    <input type="submit" value="Commenter">
</form>
<?php

foreach ($commentaires as $comment) {
    ?>
    <article>
        <h2><?= $comment->message ?></h2>
        <p>par <?= $comment->nom ?></p>
    </article>
    <?php
}
?>