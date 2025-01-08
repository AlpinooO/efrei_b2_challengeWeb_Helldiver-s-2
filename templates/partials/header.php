<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="/stylesheets/style.css" />
    <title>DiversHelper</title>
  </head>
  <body>
    <header id="header">
        <a href="">
            <img src="https://media.licdn.com/dms/image/v2/D5622AQFs4FKk1eXtmw/feedshare-shrink_800/feedshare-shrink_800/0/1709661228153?e=2147483647&v=beta&t=-5F3xfope_Mo5qnKTXIEhzL16h1REVO6NWRRSqQghQo" class="logo" alt="" />
        </a>

        <nav>
            <ul id="headerMenu" class="navbar">
                <li>
                    <a href="/">Home</a>
                </li>
                
                <?php
                if (isset($_SESSION['userID']) && !empty($_SESSION['userID'])) { ?>
                    <li>
                        <a href="/panier?id=<?= $_SESSION['userID'] ?>" id='panierLink'>
                            <i class="fa-solid fa-basket-shopping"></i>
                        </a>
                    </li>
                    <?php
                    if ($_SESSION['userRole'] === 'ADMIN') {
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
                        <a href="/login">login</a>
                    </li>
                <?php } ?>

            </ul>
        </nav>

    </header>