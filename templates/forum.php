<?php
dump($data);
?>
<section>
    <h1>Forum</h1>
    <form action="/forum" method="post">
        <input type="text" name="titre" placeholder="Titre de publication">
        <input type="text" name="message" placeholder="Contenu de la publication">
        <input type="submit" value="Publier">
    </form>
</section>