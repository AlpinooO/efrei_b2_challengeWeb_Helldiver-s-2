CREATE TABLE IF NOT EXISTS roles (
    id_role serial PRIMARY KEY,
    titre_role varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS users (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(100) NOT NULL,
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

INSERT INTO roles(titre_role) VALUES ('admin'), ('utilisateur');

-- Note: Replace 'adminadmin' with a hashed password for security
INSERT INTO users(nom, email, mdp, id_role) VALUES ('admin', 'admin@admin.com', 'adminadmin', 1);
