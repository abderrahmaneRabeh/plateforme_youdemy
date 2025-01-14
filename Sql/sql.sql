CREATE DATABASE youdemy_db;
USE youdemy_db;

CREATE TABLE utilisateurs (
    id_utilisateur INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50),
    email VARCHAR(100) UNIQUE NOT NULL,
    role ENUM('etudiant', 'enseignant', 'administrateur') NOT NULL,
    pw VARCHAR(255)
);

CREATE TABLE etudiants (
    id_etudiant INT PRIMARY KEY AUTO_INCREMENT,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE
);

CREATE TABLE enseignants (
    id_enseignant INT PRIMARY KEY AUTO_INCREMENT,
    is_active BOOLEAN DEFAULT false,
    id_utilisateur INT,
    FOREIGN KEY (id_utilisateur) REFERENCES utilisateurs(id_utilisateur) ON DELETE CASCADE
);


CREATE TABLE categories (
    id_category INT PRIMARY KEY AUTO_INCREMENT,
    category_name VARCHAR(50)
);

CREATE TABLE tags (
    id_tag INT PRIMARY KEY AUTO_INCREMENT,
    tag_name VARCHAR(50)
);

CREATE TABLE cours (
    id_cour INT PRIMARY KEY AUTO_INCREMENT,
    titre_cour VARCHAR(100),
    imgPrincipale_cours VARCHAR(255),
    imgSecondaire_cours VARCHAR(255),
    description_cours TEXT,
    contenu_cours VARCHAR(255),
    category_id INT,
    id_enseignant INT,
    FOREIGN KEY (category_id) REFERENCES categories(id_category),
    FOREIGN KEY (id_enseignant) REFERENCES enseignants(id_enseignant) 
    
);

CREATE TABLE cours_tags (
    id_cour INT,
    id_tag INT,
    PRIMARY KEY (id_cour, id_tag),
    FOREIGN KEY (id_cour) REFERENCES cours(id_cour),
    FOREIGN KEY (id_tag) REFERENCES tags(id_tag)
);

CREATE TABLE inscription (
    id_insc INT PRIMARY KEY AUTO_INCREMENT,
    id_etudiant INT,
    id_cour INT,
    date_insc TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_suspension BOOLEAN DEFAULT false,
    FOREIGN KEY (id_etudiant) REFERENCES etudiants(id_etudiant),
    FOREIGN KEY (id_cour) REFERENCES cours(id_cour)
);


-- insetion de donnees

INSERT INTO `tags` (`tag_name`) 
VALUES 
('HTML'),
('CSS'),
('JavaScript'),
('React'),
('Bootstrap'),
('Tailwind CSS'),
('Node.js'),
('Express'),
('PHP'),
('Laravel'),
('Django'),
('Spring Boot'),
('GraphQL'),
('REST API'),
('MongoDB');


INSERT INTO `categories` (`category_name`) 
VALUES 
('Web Development'),
('Mobile Development'),
('Artificial Intelligence'),
('Machine Learning'),
('Cybersecurity'),
('Cloud Computing'),
('Data Science'),
('Internet of Things'),
('Blockchain'),
('Game Development');