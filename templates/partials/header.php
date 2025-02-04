<?php
if (isset($_SESSION['user'])) {
    $userRole = $_SESSION['user']['titre_role'];
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="/stylesheets/style.css" />
    <script src="/javascripts/script.js"></script>
    <title>DiversHelper</title>
    
</head>

<body>
    <header id="header">
        <a href="/">
            <img src="/assets/Images/Helldivers_2_logo.webp" class="logo" alt="" />
        </a>

        <nav>
            <ul id="headerMenu" class="navbar">
                <li>
                    <a href="/">Accueil</a>
                </li>
                <li>
                    <a href="/map">Carte</a>
                </li>
                <li>
                    <a href="/species">Bestiaire</a>
                </li>
                <li>
                    <a href="/forum">Forums</a>
                </li>
                <li>
                    <a href="/order">Ordre Prioritaire</a>
                </li>
                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) { ?>
                    <?php
                    if ($userRole === 'admin') {
                        ?>
                        <li>
                            <a href="/admin">Admin</a>
                        </li>
                    <?php } ?>
                    <li>
                        <a href="/logout" id="logout">Déconnexion</a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="/log">Se connecter</a>
                    </li>
                <?php } ?>

            </ul>
        </nav>

    </header>