DROP DATABASE IF EXISTS veilleapp;
CREATE DATABASE veilleapp;
USE veilleapp;

-- Table des utilisateurs
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    role ENUM('etudiant', 'enseignant') NOT NULL,
    etat ENUM('en_attente','activer') DEFAULT 'en_attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des sujets
CREATE TABLE sujet (
    id_sujet INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(255) NOT NULL,
    id_etudiant INT NOT NULL,
    statut ENUM('en_attente', 'approuvé', 'rejeté') DEFAULT 'en_attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_etudiant) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des présentations
CREATE TABLE presentations (
    id_presentation INT PRIMARY KEY AUTO_INCREMENT,
    id_sujet INT NOT NULL,
    date_presentation DATE NOT NULL,
    statut ENUM('en_attente', 'validé', 'terminé', 'annulé') DEFAULT 'en_attente',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_sujet) REFERENCES sujet(id_sujet) ON DELETE CASCADE
);

-- Table des participants à une présentation
CREATE TABLE presentation_participants (
    id_presentation INT NOT NULL,
    user_id INT NOT NULL,
    PRIMARY KEY (id_presentation, user_id),
    FOREIGN KEY (id_presentation) REFERENCES presentations(id_presentation) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

-- Table des notifications
CREATE TABLE notifications (
    id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    message TEXT NOT NULL,
    lu BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
