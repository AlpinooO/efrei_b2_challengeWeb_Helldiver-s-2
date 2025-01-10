CREATE TABLE IF NOT EXISTS roles (
    id_role serial PRIMARY KEY,
    titre_role varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    id_role INT REFERENCES roles(id_role)
);

CREATE TABLE IF NOT EXISTS publication (
    id_post serial PRIMARY KEY,
    auteur int NOT NULL REFERENCES users(id_user),
    titre_post varchar(50),
    message text NOT NULL,
    parent int,
    publication date NOT NULL DEFAULT CURRENT_DATE
);

INSERT INTO roles(titre_role) VALUES ('admin'), ('utilisateur'), ('banni');

INSERT INTO users(nom, email, mdp, id_role) VALUES ('officier de la démocratie du ministère de la vérité', 'admin@admin.com', '$2y$10$iQfhYyqp/AFYbD.rWcycXepbC0ZhbbnYJHB/imSRNotMnplB/tXPu', 1);

INSERT INTO publication(auteur, titre_post, message, parent) VALUES (1, 'Devenir un HELLDIVER', '<h1>Aller sur ce site pour soutenir la SUPER TERRE</h1><br><strong><a href="https://www.playstation.com/fr-fr/games/helldivers-2/">PlayStation Store</a></strong><br><strong><a href="https://store.steampowered.com/app/553850/HELLDIVERS_2/">Steam</a></strong>', NULL);