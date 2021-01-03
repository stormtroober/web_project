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

create database LOGICO3;
use LOGICO3;


-- Tables Section
-- _____________ 

create table CARRELLO (
     IdCarrello char(1) not null,
     Utente char(1) not null,
     constraint FKPossiede_ID unique (Utente),
     constraint IDCARRELLO primary key (IdCarrello, Utente));

create table ORDINE (
     Data char(1) not null,
     IdCarrello char(1) not null,
     Prodotto char(1) not null,
     Quantità char(1) not null,
     constraint FKGenera_ID unique (IdCarrello),
     constraint IDORDINE primary key (Data, IdCarrello));

create table PRODOTTI (
     ID char(1) not null,
     Nome char(1) not null,
     Tipo char(1) not null,
     Foto char(1) not null,
     Prezzo char(1) not null,
     Quantità char(1) not null,
     Utente char(1) not null,
     constraint IDPRODOTTI primary key (ID));

create table PRODOTTI_CARRELLO (
     IdCarrello char(1) not null,
     Prodotto char(1) not null,
     Quantità char(1) not null,
     constraint FKInserimento_ID primary key (IdCarrello),
     constraint FKInserito_ID unique (Prodotto));

create table PRODOTTI_LISTA_DESIDERI (
     Prodotto char(1) not null,
     Utente char(1) not null,
     constraint FKAggiunge_ID unique (Utente),
     constraint FKAggiunto_ID primary key (Prodotto));

create table UTENTI (
     Nome char(1) not null,
     Cognome char(1) not null,
     Email char(1) not null,
     Password char(1) not null,
     Indirizzo char(1) not null,
     constraint IDUTENTI_ID primary key (Email));


-- Constraints Section
-- ___________________ 

alter table CARRELLO add constraint FKPossiede_FK
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
     references CARRELLO (IdCarrello, Utente);

alter table PRODOTTI_CARRELLO add constraint FKInserito_FK
     foreign key (Prodotto)
     references PRODOTTI (ID);

alter table PRODOTTI_LISTA_DESIDERI add constraint FKAggiunge_FK
     foreign key (Utente)
     references UTENTI (Email);

alter table PRODOTTI_LISTA_DESIDERI add constraint FKAggiunto_FK
     foreign key (Prodotto)
     references PRODOTTI (ID);

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

