#------------------------------------------------------------
#        Script MySQL.
#------------------------------------------------------------


#------------------------------------------------------------
# Table: Ville
#------------------------------------------------------------

CREATE TABLE Ville(
        CodP Int NOT NULL ,
        Nom  Varchar (25) ,
        PRIMARY KEY (CodP )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Troncon
#------------------------------------------------------------

CREATE TABLE Troncon(
        CodT    Int NOT NULL ,
        DuKm    Int ,
        AuKm    Int ,
        IDPeage Int ,
        CodA    Int ,
        PRIMARY KEY (CodT )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Peage
#------------------------------------------------------------

CREATE TABLE Peage(
        Prix    Int ,
        IDPeage int (11) Auto_increment  NOT NULL ,
        CodT    Int ,
        Code    Int ,
        PRIMARY KEY (IDPeage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Sortie
#------------------------------------------------------------

CREATE TABLE Sortie(
        Libelle  Varchar (100) ,
        Numero   Int ,
        IDSortie int (11) Auto_increment  NOT NULL ,
        CodT     Int ,
        PRIMARY KEY (IDSortie )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Entreprise
#------------------------------------------------------------

CREATE TABLE Entreprise(
        Code        Int NOT NULL ,
        Nom         Varchar (25) ,
        CA          Int ,
        DateContrat Date ,
        PRIMARY KEY (Code )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Registre
#------------------------------------------------------------

CREATE TABLE Registre(
        NumE        Int NOT NULL ,
        Description Varchar (250) ,
        DateDebut   Date ,
        DateFin     Date ,
        CodT        Int ,
        PRIMARY KEY (NumE )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Autoroute
#------------------------------------------------------------

CREATE TABLE Autoroute(
        CodA Int NOT NULL ,
        PRIMARY KEY (CodA )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: User
#------------------------------------------------------------

CREATE TABLE User(
        IDUser int (11) Auto_increment  NOT NULL ,
        Pseudo Varchar (25) ,
        Pass   Varchar (155) ,
        Role   Varchar (25) ,
        PRIMARY KEY (IDUser )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Trajet
#------------------------------------------------------------

CREATE TABLE Trajet(
        IDTrajet   int (11) Auto_increment  NOT NULL ,
        IDUser     Int ,
        CodP       Int ,
        CodP_Ville Int ,
        PRIMARY KEY (IDTrajet )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: joindre
#------------------------------------------------------------

CREATE TABLE joindre(
        CodP     Int NOT NULL ,
        IDSortie Int NOT NULL ,
        PRIMARY KEY (CodP ,IDSortie )
)ENGINE=InnoDB;

ALTER TABLE Troncon ADD CONSTRAINT FK_Troncon_IDPeage FOREIGN KEY (IDPeage) REFERENCES Peage(IDPeage);
ALTER TABLE Troncon ADD CONSTRAINT FK_Troncon_CodA FOREIGN KEY (CodA) REFERENCES Autoroute(CodA);
ALTER TABLE Peage ADD CONSTRAINT FK_Peage_CodT FOREIGN KEY (CodT) REFERENCES Troncon(CodT);
ALTER TABLE Peage ADD CONSTRAINT FK_Peage_Code FOREIGN KEY (Code) REFERENCES Entreprise(Code);
ALTER TABLE Sortie ADD CONSTRAINT FK_Sortie_CodT FOREIGN KEY (CodT) REFERENCES Troncon(CodT);
ALTER TABLE Registre ADD CONSTRAINT FK_Registre_CodT FOREIGN KEY (CodT) REFERENCES Troncon(CodT);
ALTER TABLE Trajet ADD CONSTRAINT FK_Trajet_IDUser FOREIGN KEY (IDUser) REFERENCES User(IDUser);
ALTER TABLE Trajet ADD CONSTRAINT FK_Trajet_CodP FOREIGN KEY (CodP) REFERENCES Ville(CodP);
ALTER TABLE Trajet ADD CONSTRAINT FK_Trajet_CodP_Ville FOREIGN KEY (CodP_Ville) REFERENCES Ville(CodP);
ALTER TABLE joindre ADD CONSTRAINT FK_joindre_CodP FOREIGN KEY (CodP) REFERENCES Ville(CodP);
ALTER TABLE joindre ADD CONSTRAINT FK_joindre_IDSortie FOREIGN KEY (IDSortie) REFERENCES Sortie(IDSortie);
