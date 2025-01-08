efrei_b2_serverWeb <!-- omit in toc -->
===

- [à faire](#à-faire)
  - [Installation](#installation)
  - [Start server using php](#start-server-using-php)
- [connexion a la base de données](#connexion-a-la-base-de-données)
- [utilisation](#utilisation)


# à faire
- [x] **Accueil** : Présentation générale.
- [x] **Catalogue** : Liste de produits.
- [x] **Détail produit** : Affichage des informations sur un produit sélectionné.
- [x] **Login** : Connexion utilisateur.
- [x] **Register** : Inscription utilisateur.
- [x] **Panier** : Liste des articles ajoutés au panier.

## Installation

If you don't have Composer installed, you can install it by typing this command :

```bash
sudo apt-get install composer
```

Then, you can install the project dependencies by running this command :

```bash
composer install
```

## Start server using php

```bash
php -S localhost:5001 -t public
```

### You can now access the project at `http://localhost:5001` in your browser. <!-- omit in toc -->

# connexion a la base de données

## create new user for mysql <!-- omit in toc -->

```mysql
CREATE USER 'username'@'hostname' IDENTIFIED BY 'password';

GRANT select, update, delete, insert ON database_name.* TO 'username'@'hostname';

FLUSH PRIVILEGE;
```
## remplir le fichier .config.ini <!-- omit in toc -->

```ini
# Host du serveur de base de données
DB_HOST=localhost
# Nom de la base de données
DB_NAME=b2dev2serverweblm
# Username de l'utilisateur qui peut se connecter à la base de données
DB_USERNAME=username
# Password de l'utilisateur qui peut se connecter à la base de données
DB_PASSWORD=password
```

# utilisation

## admin <!-- omit in toc -->

log : admin@admin.com

password : adminadmin
