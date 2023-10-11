CREATE DATABASE IF NOT EXISTS laboratoriodos;

USE laboratoriodos;

CREATE TABLE IF NOT EXISTS Provincia (
    id_provincia INT AUTO_INCREMENT PRIMARY KEY,
    nom_provincia VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Distrito (
    id_distrito INT AUTO_INCREMENT PRIMARY KEY,
    nom_distrito VARCHAR(255) NOT NULL,
    id_provincia INT,
    FOREIGN KEY (id_provincia) REFERENCES Provincia(id_provincia)
);

CREATE TABLE IF NOT EXISTS Nivel (
    id_nivel INT AUTO_INCREMENT PRIMARY KEY,
    nom_nivel VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(255) NOT NULL,
    apellido VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    foto BLOB,
    id_nivel INT,
    id_distrito INT,
    FOREIGN KEY (id_nivel) REFERENCES Nivel(id_nivel),
    FOREIGN KEY (id_distrito) REFERENCES Distrito(id_distrito)
);
