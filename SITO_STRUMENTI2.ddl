-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Sun Jan  3 17:23:55 2021 
-- * LUN file: C:\Users\Thomas\Desktop\TecnologieWeb\SITO_STRUMENTI - Copia.lun 
-- * Schema: LOGICO3/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database guitar_benter;
use guitar_benter;


-- Tables Section
-- _____________ 

create table CARRELLO (
     IdCarrello int(11) not null AUTO_INCREMENT,
     Utente char(40) not null,
     constraint FKPossiede_ID unique (Utente, IdCarrello),
     constraint IDCARRELLO primary key (IdCarrello, Utente));

create table ORDINE (
     Utente char(40) not null,
     Data datetime not null,
     IdCarrello int(11) not null,
     Totale int(10) not null,
     constraint IDORDINE primary key (Utente, Data),
     constraint FKGenera_ID unique (IdCarrello,Utente));

create table PRODOTTI (
     ID int(11) not null AUTO_INCREMENT,
     Nome char(40) not null,
     Tipo char(20) not null,
     Marca char(20) not null,
     Foto char(40) not null,
     Descrizione mediumtext,
     Caratteristiche varchar(150),
     Prezzo int(10) not null,
     Quantità int(10) not null,
     Utente char(40) not null,
     constraint IDPRODOTTI primary key (ID));

create table PRODOTTI_CARRELLO (
     IdCarrello int(11) not null,
     Prodotto int(11) not null,
     Quantità int(10) not null,
     constraint FKInserimento_ID primary key (IdCarrello,Prodotto),
     constraint FKInserito_ID unique (Prodotto, IdCarrello));

create table PRODOTTI_LISTA_DESIDERI (
     Prodotto int(11) not null,
     Utente char(40) not null,
     constraint FKAggiunge_ID unique (Utente),
     constraint FKAggiunto_ID primary key (Utente, Prodotto));

create table UTENTI (
     Nome char(20) not null,
     Cognome char(20) not null,
     Email char(40) not null,
     Password char(128) not null,
     Salt char(128) not null,
     Tipo char(20) not null,
     Indirizzo char(30) not null,
     constraint IDUTENTI_ID primary key (Email));
     
create table LOGIN_ATTEMPTS (
     Email char(40) not null,
     time varchar(30) not null
);


-- Constraints Section
-- ___________________ 

alter table CARRELLO add constraint FKPossiede_FK
     foreign key (Utente)
     references UTENTI (Email);

alter table ORDINE add constraint FKGenerato_FK
     foreign key (Utente)
     references UTENTI (Email);

alter table ORDINE add constraint FKGenera_FK
     foreign key (IdCarrello)
     references PRODOTTI_CARRELLO (IdCarrello);

alter table PRODOTTI add constraint FKInserisce
     foreign key (Utente)
     references UTENTI (Email);


-- Not implemented
-- alter table PRODOTTI_CARRELLO add constraint FKInserimento_CHK
--     check(exists(select * from ORDINE
--                  where ORDINE.IdCarrello = IdCarrello)); 

alter table PRODOTTI_CARRELLO add constraint FKInserimento_FK
     foreign key (IdCarrello)
     references CARRELLO (IdCarrello);

alter table PRODOTTI_CARRELLO add constraint FKInserito_FK
     foreign key (Prodotto)
     references PRODOTTI (ID);

alter table PRODOTTI_LISTA_DESIDERI add constraint FKAggiunge_FK
     foreign key (Utente)
     references UTENTI (Email);

alter table PRODOTTI_LISTA_DESIDERI add constraint FKAggiunto_FK
     foreign key (Prodotto)
     references PRODOTTI (ID);

ALTER TABLE PRODOTTI_LISTA_DESIDERI
DROP INDEX FKAggiunge_ID;

-- Not implemented
-- alter table UTENTI add constraint IDUTENTI_CHK
--     check(exists(select * from PRODOTTI
--                  where PRODOTTI.Utente = Email)); 

-- Not implemented
-- alter table UTENTI add constraint IDUTENTI_CHK
--     check(exists(select * from CARRELLO
--                  where CARRELLO.Utente = Email)); 


-- Index Section
-- _____________ 