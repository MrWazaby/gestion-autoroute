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
        idPeage Int ,
        CodA    Int ,
        NumE    Int ,
        PRIMARY KEY (CodT )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Peage
#------------------------------------------------------------

CREATE TABLE Peage(
        idPeage Int NOT NULL ,
        PGDuKm  Int ,
        PGAuKm  Int ,
        Prix    Int ,
        CodT    Int ,
        Code    Int ,
        PRIMARY KEY (idPeage )
)ENGINE=InnoDB;


#------------------------------------------------------------
# Table: Sortie
#------------------------------------------------------------

CREATE TABLE Sortie(
        idSortie int (11) Auto_increment  NOT NULL ,
        Libelle  Varchar (100) ,
        Numero   Int ,
        CodA     Int ,
        PRIMARY KEY (idSortie )
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
# Table: joindre
#------------------------------------------------------------

CREATE TABLE joindre(
        CodP     Int NOT NULL ,
        idSortie Int NOT NULL ,
        PRIMARY KEY (CodP ,idSortie )
)ENGINE=InnoDB;

ALTER TABLE Troncon ADD CONSTRAINT FK_Troncon_idPeage FOREIGN KEY (idPeage) REFERENCES Peage(idPeage);
ALTER TABLE Troncon ADD CONSTRAINT FK_Troncon_CodA FOREIGN KEY (CodA) REFERENCES Autoroute(CodA);
ALTER TABLE Troncon ADD CONSTRAINT FK_Troncon_NumE FOREIGN KEY (NumE) REFERENCES Registre(NumE);
ALTER TABLE Peage ADD CONSTRAINT FK_Peage_CodT FOREIGN KEY (CodT) REFERENCES Troncon(CodT);
ALTER TABLE Peage ADD CONSTRAINT FK_Peage_Code FOREIGN KEY (Code) REFERENCES Entreprise(Code);
ALTER TABLE Sortie ADD CONSTRAINT FK_Sortie_CodA FOREIGN KEY (CodA) REFERENCES Autoroute(CodA);
ALTER TABLE joindre ADD CONSTRAINT FK_joindre_CodP FOREIGN KEY (CodP) REFERENCES Ville(CodP);
ALTER TABLE joindre ADD CONSTRAINT FK_joindre_idSortie FOREIGN KEY (idSortie) REFERENCES Sortie(idSortie);
