#DROP DATABASE IF EXISTS SDIS_DB_PF;

#CREATE DATABASE IF NOT EXISTS SDIS_DB_PF;
#USE SDIS_DB_PF;
# -----------------------------------------------------------------------------
#       TABLE : FONCTION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FONCTION
 (
   FCT_ID CHAR(15) NOT NULL  ,
   FCT_LIBELLE VARCHAR(60) NOT NULL  
   , PRIMARY KEY (FCT_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       TABLE : POMPIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS POMPIER
 (
   SP_MATRICULE VARCHAR(7) NOT NULL  ,
   GRA_ID CHAR(3) NULL  ,
   CIS_ID INTEGER NULL  ,
   SP_NOM VARCHAR(60) NOT NULL  ,
   SP_PRENOM VARCHAR(60) NOT NULL  ,
   SP_DTE_NAISSANCE DATE NOT NULL  ,
   SP_TEL_FIXE VARCHAR(10) NULL  ,
   SP_TEL_PORTABLE VARCHAR(10) NOT NULL  ,
   SP_BIP VARCHAR(8) NOT NULL  ,
   SP_STATUT VARCHAR(15) NOT NULL       CHECK (SP_STATUT in ("PROFESSIONNEL","VOLONTAIRE")),
   SP_DTE_MAJ DATE NOT NULL  ,
   DATE_PROMOTION DATE NULL  ,
   DATE_AFFECTATION DATE NULL  
   , PRIMARY KEY (SP_MATRICULE) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE POMPIER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_POMPIER_GRADE
     ON POMPIER (GRA_ID ASC);

CREATE  INDEX I_FK_POMPIER_CASERNE
     ON POMPIER (CIS_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : FORMATION
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS FORMATION
 (
   FOR_ID VARCHAR(32) NOT NULL  ,
   FCT_ID CHAR(15) NULL  ,
   FOR_LIBELLE VARCHAR(32) NOT NULL  ,
   FOR_DTE_DEBUT DATE NOT NULL  ,
   FOR_DTE_FIN DATE NOT NULL  ,
   FOR_CAPACITE SMALLINT NOT NULL  ,
   FOR_SALLE VARCHAR(32) NULL  ,
   FOR_ADRESSE VARCHAR(120) NULL  ,
   FOR_CP VARCHAR(5) NULL  ,
   FOR_VILLE VARCHAR(60) NOT NULL  ,
   FOR_DESCRIPTION VARCHAR(255) NULL  
   , PRIMARY KEY (FOR_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FORMATION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_FORMATION_FONCTION
     ON FORMATION (FCT_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : GRADE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS GRADE
 (
   GRA_ID CHAR(3) NOT NULL  ,
   GRA_LIBELLE VARCHAR(32) NOT NULL  
   , PRIMARY KEY (GRA_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       TABLE : LOGIN
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS LOGIN
 (
   LOG_LOGIN VARCHAR(32) NOT NULL  ,
   SP_MATRICULE VARCHAR(7) NOT NULL  ,
   LOG_MDP VARCHAR(32) NOT NULL  ,
   LOG_NOM VARCHAR(60) NOT NULL  ,
   LOG_PRENOM VARCHAR(60) NULL  ,
   LOG_PROFIL VARCHAR(3) NOT NULL       CHECK (LOG_PROFIL in ("SP","CTA","SF"))
   , PRIMARY KEY (LOG_LOGIN) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE LOGIN
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_LOGIN_POMPIER
     ON LOGIN (SP_MATRICULE ASC);

# -----------------------------------------------------------------------------
#       TABLE : CASERNE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS CASERNE
 (
   CIS_ID INTEGER NOT NULL  ,
   CIS_NOM VARCHAR(60) NOT NULL  
   , PRIMARY KEY (CIS_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       TABLE : INSCRIRE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INSCRIRE
 (
   SP_MATRICULE VARCHAR(7) NOT NULL  ,
   FOR_ID VARCHAR(32) NOT NULL  
   , PRIMARY KEY (SP_MATRICULE,FOR_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INSCRIRE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INSCRIRE_POMPIER
     ON INSCRIRE (SP_MATRICULE ASC);

CREATE  INDEX I_FK_INSCRIRE_FORMATION
     ON INSCRIRE (FOR_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : VALIDE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS VALIDE
 (
   SP_MATRICULE VARCHAR(7) NOT NULL  ,
   FOR_ID VARCHAR(32) NOT NULL  
   , PRIMARY KEY (SP_MATRICULE,FOR_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE VALIDE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_VALIDE_POMPIER
     ON VALIDE (SP_MATRICULE ASC);

CREATE  INDEX I_FK_VALIDE_FORMATION
     ON VALIDE (FOR_ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : EXERCER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS EXERCER
 (
   SP_MATRICULE VARCHAR(7) NOT NULL  ,
   FCT_ID CHAR(15) NOT NULL  
   , PRIMARY KEY (SP_MATRICULE,FCT_ID) 
 ) 
 engine=InnoDB comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE EXERCER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_EXERCER_POMPIER
     ON EXERCER (SP_MATRICULE ASC);

CREATE  INDEX I_FK_EXERCER_FONCTION
     ON EXERCER (FCT_ID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE POMPIER 
  ADD FOREIGN KEY FK_POMPIER_GRADE (GRA_ID)
      REFERENCES GRADE (GRA_ID) ;


ALTER TABLE POMPIER 
  ADD FOREIGN KEY FK_POMPIER_CASERNE (CIS_ID)
      REFERENCES CASERNE (CIS_ID) ;


ALTER TABLE FORMATION 
  ADD FOREIGN KEY FK_FORMATION_FONCTION (FCT_ID)
      REFERENCES FONCTION (FCT_ID) ;


ALTER TABLE LOGIN 
  ADD FOREIGN KEY FK_LOGIN_POMPIER (SP_MATRICULE)
      REFERENCES POMPIER (SP_MATRICULE) ;


ALTER TABLE INSCRIRE 
  ADD FOREIGN KEY FK_INSCRIRE_POMPIER (SP_MATRICULE)
      REFERENCES POMPIER (SP_MATRICULE) ;


ALTER TABLE INSCRIRE 
  ADD FOREIGN KEY FK_INSCRIRE_FORMATION (FOR_ID)
      REFERENCES FORMATION (FOR_ID) ;


ALTER TABLE VALIDE 
  ADD FOREIGN KEY FK_VALIDE_POMPIER (SP_MATRICULE)
      REFERENCES POMPIER (SP_MATRICULE) ;


ALTER TABLE VALIDE 
  ADD FOREIGN KEY FK_VALIDE_FORMATION (FOR_ID)
      REFERENCES FORMATION (FOR_ID) ;


ALTER TABLE EXERCER 
  ADD FOREIGN KEY FK_EXERCER_POMPIER (SP_MATRICULE)
      REFERENCES POMPIER (SP_MATRICULE) ;


ALTER TABLE EXERCER 
  ADD FOREIGN KEY FK_EXERCER_FONCTION (FCT_ID)
      REFERENCES FONCTION (FCT_ID) ;

