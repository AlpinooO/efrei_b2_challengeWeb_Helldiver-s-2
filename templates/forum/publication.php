<?php
$publication = $data['publication'];
$commentaires = $data['comments'];
dump($data);

?>
<article>
    <h2><?= $publication['titre_post'] ?></h2>
    <p><?= $publication['message'] ?></p>
    <p>publié le <?= $publication['publication'] ?> par <?= $publication['nom'] ?></p>
</article>
<?php

foreach ($commentaires as $publi) {
    ?>
    <article>
        <h2><?= htmlspecialchars($publi['titre_post'] ?? '') ?></h2>
        <p><?= htmlspecialchars($publi['message'] ?? '') ?></p>
        <p><?= htmlspecialchars($publi['publication'] ?? '') ?></p>
        <p><?= htmlspecialchars($publi['nom'] ?? '') ?></p>
    </article>
    <?php
}
?>