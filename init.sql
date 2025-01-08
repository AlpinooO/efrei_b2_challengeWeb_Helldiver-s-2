DROP DATABASE divers_helper;
CREATE DATABASE divers_helper;


CREATE TABLE IF NOT EXISTS roles(
id_role serial PRIMARY KEY,
titre varchar(50) NOT NULL
);


CREATE TABLE IF NOT EXISTS users(
 id_user serial PRIMARY KEY,
 nom varchar(50) NOT NULL,
 email varchar(100) NOT NULL,
 mdp varchar (100) NOT NULL,
 id_role int REFERENCES roles(id_role)
);


CREATE TABLE IF NOT EXISTS posts(
	id_post serial PRIMARY KEY,
	auteur varchar(100) NOT NULL,
	titre varchar(50),
	message varchar(255) NOT NULL,
	parent int,
	id_user int NOT NULL REFERENCES users
)