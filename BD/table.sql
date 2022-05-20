CREATE TABLE IF NOT EXISTS Clients(
    Id int PRIMARY KEY AUTO_INCREMENT,
    Nom VARCHAR(15) NOT NULL ,
    Prenom VARCHAR(15),
    Address MULTILINESTRING NOT NULL,
    Telephone INT   NOT NULL ,
    Date_rendezVous DATE NOT NULL,
    DateCréation DATE

    )