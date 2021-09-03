CREATE DATABASE IF NOT EXISTS pizzeria CHARACTER SET utf8 COLLATE utf8_general_ci;
USE pizzeria;

CREATE TABLE pizza (
    nom VARCHAR (25) PRIMARY KEY NOT NULL,
    prix_vente DECIMAL (5,2),
    note_consommateur DECIMAL (2,1)
) ENGINE=InnoDB;

CREATE TABLE produit (
    nom VARCHAR (25) PRIMARY KEY NOT NULL,
    prix_kg DECIMAL (5,2),
    allergene BOOLEAN
) ENGINE=InnoDB;

CREATE TABLE ingredient (
    nom VARCHAR(25),
    nom_pizza VARCHAR(25),
    quantite INT,
    FOREIGN KEY (nom_pizza) REFERENCES pizza(nom),
    FOREIGN KEY (nom) REFERENCES produit(nom),
    PRIMARY KEY (nom, nom_pizza)
) ENGINE=InnoDB;

CREATE TABLE vente (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    datev DATE,
    nom_pizza VARCHAR(25),
    FOREIGN KEY (nom_pizza) REFERENCES pizza(nom)
) ENGINE=InnoDB;

INSERT INTO pizza (nom, prix_vente, note_consommateur) VALUES
    ("4 Fromages",7.00,NULL),
    ("Auvergnate",9.00,NULL),
    ("Calzone",9.00,NULL),
    ("Chèvre",9.60,NULL),
    ("Chèvre-miel",10.20,NULL),
    ("Espagnole",6.80,NULL),
    ("Hawaïenne",11.60,NULL),
    ("Kebab",8.30,NULL),
    ("Margherita",6.00,NULL),
    ("Pepperoni",8.50,NULL),
    ("Truffade","9,40",NULL);

INSERT INTO produit (nom, prix_kg, allergene) VALUES
    ("Ananas",2.53,0),
    ("Anchois",48.00,0),
    ("Boeuf Haché",22.12,0),
    ("Câpres",49.00,0),
    ("Champignons",3.60,1),
    ("Chorizo",14.00,0),
    ("Crème fraîche",14.00,1),
    ("Emmental râpé",0.45,1),
    ("Fromage de chèvre",3.50,1),
    ("Jambon",27.96,0),
    ("Kebab",8.05,0),
    ("Lardons",8.05,0),
    ("Miel",9.60,0),
    ("Mozzarella",11.00,1),
    ("Oignons",0.42,0),
    ("Olives",7.38,0),
    ("Poivrons",2.50,0),
    ("Poulet",12.70,0),
    ("Saint-Nectaire",17.00,1),
    ("Sauce Tomate",2.36,0),
    ("Saumon Fumé",29.00,0),
    ("Sel",18.00,0),
    ("Tome Fraîche",9.30,1);

INSERT INTO ingredient (nom, nom_pizza, quantite) VALUES
    ("Champignons", "Espagnole", 100),
    ("Chorizo", "Espagnole", 56),
    ("Crème fraîche", "Chèvre-miel", 65),
    ("Emmental râpé", "4 Fromages", 75),
    ("Emmental râpé", "Auvergnate", 95),
    ("Emmental râpé", "Chèvre", 50),
    ("Emmental râpé", "Espagnole", 95),
    ("Emmental râpé", "Kebab", 90),
    ("Fromage de chèvre", "4 Fromages", 50),
    ("Fromage de chèvre", "Chèvre", 125),
    ("Fromage de chèvre", "Chèvre-miel", 0.5),
    ("Jambon", "4 Fromages", 220),
    ("Jambon", "Auvergnate", 90),
    ("Jambon", "Calzone", 250),
    ("Jambon", "Espagnole", 185),
    ("Kebab", "Kebab", 80),
    ("Lardons", "Auvergnate", 120),
    ("Miel", "Chèvre", 49),
    ("Miel", "Chèvre-miel", 50),
    ("Miel", "Kebab", 85),
    ("Mozzarella", "4 Fromages", 100),
    ("Mozzarella", "Calzone", 150),
    ("Mozzarella", "Espagnole", 200),
    ("Mozzarella", "Kebab", 160),
    ("Mozzarella", "Margherita", 125),
    ("Oignons", "4 Fromages", 125),
    ("Oignons", "Auvergnate", 75),
    ("Oignons", "Chèvre", 200),
    ("Oignons", "Espagnole", 333),
    ("Oignons", "Kebab", 120),
    ("Olives", "4 Fromages", 10),
    ("Olives", "Auvergnate", 10),
    ("Olives", "Kebab", 40),
    ("Poivrons", "Espagnole", 70),
    ("Saint-Nectaire", "4 Fromages", 60),
    ("Saint-Nectaire", "Auvergnate", 150),
    ("Sauce Tomate", "4 Fromages", 185),
    ("Sauce Tomate", "Auvergnate", 75),
    ("Sauce Tomate", "Chèvre", 200),
    ("Sauce Tomate", "Espagnole", 25),
    ("Sauce Tomate", "Kebab", 50),
    ("Sauce Tomate", "Margherita", 200),
    ("Sel", "Chèvre-miel", 18),
    ("Sel","Pepperoni",NULL),
    ("Sel", "Hawaïenne",NULL),
    ("Jambon", "Hawaïenne",NULL),
    ("Sauce Tomate", "Hawaïenne",NULL),
    ("Sauce Tomate","Pepperoni",NULL),
    ("Mozzarella", "Hawaïenne",NULL),
    ("Mozzarella","Pepperoni",NULL),
    ("Emmental râpé","Pepperoni",NULL),
    ("Emmental râpé", "Hawaïenne",NULL),
    ("Ananas", "Hawaïenne",NULL),
    ("Chorizo","Pepperoni",NULL),
    ("Lardons","Truffade",NULL),
    ("Anchois","Truffade",NULL),
    ("Tome Fraîche","Truffade",NULL);    

INSERT INTO vente (datev,nom_pizza) VALUES
    ("2021-9-01","Espagnole"),
    ("2021-9-01","Calzone");
