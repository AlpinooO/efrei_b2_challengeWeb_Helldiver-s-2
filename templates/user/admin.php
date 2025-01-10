<section class="admin-container">
    <form action="/admin" method="post">
        <input type="hidden" name="ban" value="ban">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" class="submit" value="bannir l'utilisateur">
    </form>
    <form action="/admin" method="post">
        <input type="hidden" name="ban" value="unban">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" class="submit" value="débannir l'utilisateur">
    </form>
    <form action="/admin" method="post">
        <input type="hidden" name="ban" value="admin">
        <input type="text" name="email" placeholder="Email">
        <input type="submit" class="submit" value="faire de l'utilisateur un admin">
    </form>
    <?php
    if (isset($data['error'])) {
        echo '<p class="error">' . $data['error'] . '</p>';
    }
    if (isset($data['succes'])) {
        echo '<p class="success">' . $data['succes'] . '</p>';
    }

    ?>
</section>