<?php
dump($data);
$publications = $data['publications'];
?>
<section>
    <h1>Forum</h1>
    <form action="/forum" method="post">
        <input type="text" name="titre" placeholder="Titre de publication">
        <input type="text" name="message" placeholder="Contenu de la publication">
        <input type="submit" value="Publier">
    </form>

    <?php foreach ($publications as $publication): ?>
        <article>
            <h2><?= $publication->titre_post ?></h2>
            <p><?= $publication->message ?></p>
            <p><?= $publication->publication ?></p>
            <p><?= $publication->auteur ?></p>
            <a href="/forum?id=<?= $publication->id_post ?>">Voir la publication</a>
        </article>
    <?php endforeach; ?>
</section>