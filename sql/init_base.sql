CREATE DATABASE IF NOT EXISTS test;
USE test;

CREATE TABLE IF NOT EXISTS joueurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    equipe VARCHAR(100) NOT NULL,
    position VARCHAR(50) NOT NULL,
    age INT NOT NULL
);