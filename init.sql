CREATE TABLE IF NOT EXISTS roles(
	id_role serial PRIMARY KEY,
	titre varchar(50) NOT NULL
);


CREATE TABLE IF NOT EXISTS users (
    id_user SERIAL PRIMARY KEY,
    nom VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(100) NOT NULL,
    id_role INT REFERENCES roles(id_role)
);

CREATE TABLE IF NOT EXISTS publication(
	id_post serial PRIMARY KEY,
	auteur int NOT NULL REFERENCES users,
	titre varchar(50),
	message varchar(255) NOT NULL,
	parent int,
	publication date not null,
);

INSERT INTO roles(titre) VALUES ('admin'), ('utilisateur');

INSERT INTO users(nom, email,mdp,id_role) VALUES ('admin', 'admin@admin.com', 'adminadmin', 1);

