CREATE TABLE formation (
  id_formation INT AUTO_INCREMENT PRIMARY KEY,
  titre VARCHAR(100) NOT NULL,
  description TEXT,
  duree_mois INT NOT NULL,
  prix DECIMAL(8,2) NOT NULL
) ENGINE=InnoDB;

CREATE TABLE etudiant (
  id_etudiant INT AUTO_INCREMENT PRIMARY KEY,
  nom VARCHAR(50) NOT NULL,
  prenom VARCHAR(50) NOT NULL,
  email VARCHAR(100) NOT NULL,
  telephone VARCHAR(20),
  date_naissance DATE,
  id_formation INT NOT NULL,
  FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
    ON DELETE CASCADE
) ENGINE=InnoDB;

CREATE TABLE module (
  id_module INT AUTO_INCREMENT PRIMARY KEY,
  nom_module VARCHAR(100) NOT NULL,
  volume_horaire INT NOT NULL,
  coefficient INT DEFAULT 1,
  id_formation INT NOT NULL,
  FOREIGN KEY (id_formation) REFERENCES formation(id_formation)
    ON DELETE CASCADE
) ENGINE=InnoDB;
INSERT INTO formation (titre, description, duree_mois, prix) VALUES
('Développement Web', 'PHP, MySQL, JavaScript', 10, 8000.00),
('Réseaux et Systèmes', 'Cisco, Linux, sécurité', 9, 7000.00);

INSERT INTO etudiant (nom, prenom, email, telephone, date_naissance, id_formation) VALUES
('Alaoui', 'Sara', 'sara@mail.com', '0612345678', '2003-05-14', 1),
('Benani', 'Youssef', 'youssef@mail.com', '0623456789', '2002-11-02', 2);

INSERT INTO module (nom_module, volume_horaire, coefficient, id_formation) VALUES
('PHP et MySQL', 40, 3, 1),
('HTML et CSS', 30, 2, 1),
('Administration Linux', 35, 3, 2);