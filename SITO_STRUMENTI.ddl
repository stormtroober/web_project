-- *********************************************
-- * SQL MySQL generation
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1
-- * Generator date: Dec  4 2018
-- * Generation date: Sat Dec 26 15:05:44 2020
-- * LUN file: C:\Users\Thomas\Desktop\TecnologieWeb\SITO_STRUMENTI - Copia.lun
-- * Schema: SITO_STRUMENTI_LOGICO/1
-- *********************************************


-- Database Section
-- ________________

create database guitar_benter;
use guitar_benter;


-- Tables Section
-- _____________

create table CARRELLO (
     Utente int(10) not null,
     Prodotto int(10) not null,
     Quantità int(10) not null,
     constraint FKPossiede_ID primary key (Utente));

create table PRODOTTI_CARRELLO (
     Utente int(10) not null,
     ID int(10) not null,
     constraint IDInserito primary key (Utente, ID));

create table LISTA_DESIDERI (
     Utente int(10) not null,
     Prodotto int(10) not null,
     constraint FKAppartiene_ID primary key (Utente));

create table ORDINE (
     Utente int(10) not null,
     Data datetime,
     Prodotto int(10) not null,
     Quantità int(10) not null,
     constraint IDORDINE primary key (Utente, Data));

create table PRODOTTI (
     ID int(10) not null AUTO_INCREMENT,
     Nome char(40) not null,
     Tipo char(20) not null,
     Marca char(20) not null,
     Foto char(40) not null,
     Descrizione mediumtext,
     Caratteristiche varchar(150),
     Prezzo int(10) not null,
     Quantità int(10) not null,
     constraint IDPRODOTTI primary key (ID));

create table UTENTI (
     ID int(10) not null AUTO_INCREMENT,
     Nome char(20) not null,
     Cognome char(20) not null,
     Email char(40) not null,
     Password char(128) not null,
     Salt char(128) not null, 
     Tipo char(20) not null,
     Indirizzo char(30) not null,
     constraint IDUTENTI_ID primary key (ID));

create table LOGIN_ATTEMPTS (
     id int(10) not null,
     time varchar(30) not null
);


-- Constraints Section
-- ___________________

alter table CARRELLO add constraint FKPossiede_FK
     foreign key (Utente)
     references UTENTI (ID);

alter table PRODOTTI_CARRELLO add constraint FKIns_PRO
     foreign key (ID)
     references PRODOTTI (ID);

alter table PRODOTTI_CARRELLO add constraint FKIns_CAR
     foreign key (Utente)
     references CARRELLO (Utente);

alter table LISTA_DESIDERI add constraint FKAppartiene_FK
     foreign key (Utente)
     references UTENTI (ID);

alter table ORDINE add constraint FKEffettua
     foreign key (Utente)
     references UTENTI (ID);

-- Not implemented
-- alter table UTENTI add constraint IDUTENTI_CHK
--     check(exists(select * from CARRELLO
--                  where CARRELLO.Utente = ID));

-- Not implemented
-- alter table UTENTI add constraint IDUTENTI_CHK
--     check(exists(select * from LISTA_DESIDERI
--                  where LISTA_DESIDERI.Utente = ID));


-- Index Section
-- _____________
