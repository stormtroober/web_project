-- *********************************************
-- * SQL MySQL generation                      
-- *--------------------------------------------
-- * DB-MAIN version: 11.0.1              
-- * Generator date: Dec  4 2018              
-- * Generation date: Sun Jan  3 16:30:16 2021 
-- * LUN file: C:\Users\Thomas\Desktop\TecnologieWeb\SITO_STRUMENTI - Copia.lun 
-- * Schema: LOGICO2/1 
-- ********************************************* 


-- Database Section
-- ________________ 

create database LOGICO2;
use LOGICO2;


-- Tables Section
-- _____________ 

create table CARRELLO (
     IdCarrello char(1) not null,
     Utente char(1) not null,
     constraint IDCARRELLO primary key (IdCarrello),
     constraint FKPossiede_ID unique (Utente));

create table ORDINE (
     Utente char(1) not null,
     Data char(1) not null,
     Ins_IdCarrello char(1) not null,
     Prodotto char(1) not null,
     Quantità char(1) not null,
     constraint IDORDINE primary key (Utente, Data),
     constraint FKGenera_ID unique (Ins_IdCarrello));

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
     Ins_IdCarrello char(1) not null,
     IdCarrello char(1) not null,
     Prodotto char(1) not null,
     ID char(1) not null,
     Quantità char(1) not null,
     constraint IDPRODOTTI_CARRELLO_ID primary key (Ins_IdCarrello, IdCarrello),
     constraint IDPRODOTTI_CARRELLO_1 unique (ID, Prodotto));

create table PRODOTTI_LISTA_DESIDERI (
     ID char(1) not null,
     IdListaDesideri char(1) not null,
     Prodotto char(1) not null,
     Email char(1) not null,
     constraint IDPRODOTTI_LISTA_DESIDERI primary key (ID, Prodotto),
     constraint IDPRODOTTI_LISTA_DESIDERI_1 unique (Email, IdListaDesideri));

create table UTENTI (
     Nome char(1) not null,
     Cognome char(1) not null,
     Email char(1) not null,
     IdCarrello char(1) not null,
     Utente char(1) not null,
     Password char(1) not null,
     Indirizzo char(1) not null,
     constraint IDUTENTI_ID primary key (Email));


-- Constraints Section
-- ___________________ 

alter table CARRELLO add constraint FKPossiede_FK
     foreign key (Utente)
     references UTENTI (Email);

alter table ORDINE add constraint FKGenera_FK
     foreign key (Ins_IdCarrello)
     references PRODOTTI_CARRELLO (Ins_IdCarrello, IdCarrello);

alter table PRODOTTI add constraint FKInserisce
     foreign key (Utente)
     references UTENTI (Email);

-- Not implemented
-- alter table PRODOTTI_CARRELLO add constraint IDPRODOTTI_CARRELLO_CHK
--     check(exists(select * from ORDINE
--                  where ORDINE.Ins_IdCarrello = Ins_IdCarrello)); 

alter table PRODOTTI_CARRELLO add constraint FKInserimento
     foreign key (Ins_IdCarrello)
     references CARRELLO (IdCarrello);

alter table PRODOTTI_CARRELLO add constraint FKInserito
     foreign key (ID)
     references PRODOTTI (ID);

alter table PRODOTTI_LISTA_DESIDERI add constraint FKAggiunge
     foreign key (Email)
     references UTENTI (Email);

alter table PRODOTTI_LISTA_DESIDERI add constraint FKAggiunto
     foreign key (ID)
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

