CREATE TABLE Country
(
       id_country NUMBER(6) NOT NULL,
       name_country VARCHAR2(20),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Country
      ADD CONSTRAINT pk_country_id PRIMARY KEY(id_country)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
      
-----------------------------------------------------

CREATE TABLE City
(
       id_city NUMBER(6) NOT NULL,
       name_city VARCHAR2(20),
       fk_country_id NUMBER(6),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE City
      ADD CONSTRAINT pk_city_id PRIMARY KEY(id_city)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
--ForeingKey
ALTER TABLE City
      ADD CONSTRAINT fk_country_id FOREIGN KEY(fk_country_id)
      REFERENCES Country(id_country);
-----------------------------------------------------
CREATE TABLE Stadium
(
       id_stadium NUMBER(6) NOT NULL,
       name_stadium VARCHAR2(20),
       capasity NUMBER(20),
       photo BLOB,
       fk_city_id NUMBER(6) NOT NULL,
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Stadium
      ADD CONSTRAINT pk_stadium_id PRIMARY KEY(id_stadium)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
--ForeingKey
ALTER TABLE Stadium
      ADD CONSTRAINT fk_cityStadium_id FOREIGN KEY(fk_city_id)
      REFERENCES City(id_city);
-----------------------------------------------------
CREATE TABLE Admin
(
       nick_name VARCHAR2(20) NOT NULL,
       password VARCHAR2(20),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Admin
      ADD CONSTRAINT pk_admin_id PRIMARY KEY(nick_name)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
      
-----------------------------------------------------
create table PARAMETER
(
  parameter_id          NUMBER(6) not null,
  parameter_name        VARCHAR2(20),
  parameter_value       NUMBER(6),
  --Campos de Auditoria
  fec_creacion          DATE,
  creado_por            VARCHAR2(10),
  fec_ultima_mod        DATE,
  user_ultima_mod       VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE PARAMETER
      ADD CONSTRAINT pk_parameter_id PRIMARY KEY(parameter_id)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
    
------------------------------------------------------
CREATE TABLE Event
(
       id_event NUMBER(6) NOT NULL,
       name_event VARCHAR2(20),
       description VARCHAR2(20),
       start_date DATE,
       end_date DATE,
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Event
      ADD CONSTRAINT pk_event_id PRIMARY KEY(id_event)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
      
-----------------------------------------------------

CREATE TABLE Action_Type
(
       id_actionType NUMBER(6) NOT NULL,
       description VARCHAR2(20),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Action_Type
      ADD CONSTRAINT pk_actionType_id PRIMARY KEY(id_actionType)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
      
-----------------------------------------------------
CREATE TABLE Team
(
       id_team NUMBER(6) NOT NULL,
       name_team VARCHAR2(20),
       flag BLOB,
       photo BLOB,
       fk_captain_id NUMBER(6),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);

CREATE TABLE Player
(
       id_player NUMBER(6) NOT NULL,
       first_name VARCHAR2(20),
       last_name VARCHAR2(20),
       nickname VARCHAR2(20),
       fk_team_id number(6),
       t_shirt_num NUMBER(2),
       photo BLOB,
       fk_country_id NUMBER(6),
       genre number(1), ---Si es hombre, va a estar en 1, mujer ser� 0
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Team
      ADD CONSTRAINT pk_team_id PRIMARY KEY(id_team)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
--PrimaryKey
ALTER TABLE Player
      ADD CONSTRAINT pk_player_id PRIMARY KEY(id_player)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
      
--ForeingKey
ALTER TABLE Team
      ADD CONSTRAINT fk_captain_id FOREIGN KEY(fk_captain_id)
      REFERENCES Player(id_player);
-----------------------------------------------------




--ForeingKey
ALTER TABLE Player
      ADD CONSTRAINT fk_country_id_player FOREIGN KEY(fk_country_id)
      REFERENCES Country(id_country);
alter table player
      ADD CONSTRAINT fk_teamPlayer_id FOREIGN KEY(fk_team_id)
      REFERENCES Team(id_team);
      
-----------------------------------------------------

CREATE TABLE Groupp
(
       id_group NUMBER(6) NOT NULL,
       name_Group VARCHAR2(20),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Groupp
      ADD CONSTRAINT pk_group_id PRIMARY KEY(id_group)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
-----------------------------------------------------


CREATE TABLE Award
(
       id_award NUMBER(6) NOT NULL,
       name_award VARCHAR2(20),
       description VARCHAR2(20),
       photo BLOB,
       fk_event_id NUMBER(6),
       fk_player_id NUMBER(6),
       fk_team_id NUMBER(6),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Award
      ADD CONSTRAINT pk_award_id PRIMARY KEY(id_award)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
--ForeingKey
ALTER TABLE Award
      ADD CONSTRAINT fk_eventAward_id FOREIGN KEY(fk_event_id)
      REFERENCES Event(id_event);
--ForeingKey
ALTER TABLE Award
      ADD CONSTRAINT fk_playerAward_id FOREIGN KEY(fk_player_id)
      REFERENCES Player(id_player);
--ForeingKey
ALTER TABLE Award
      ADD CONSTRAINT fk_teamAward_id FOREIGN KEY(fk_team_id)
      REFERENCES Team(id_team);
-----------------------------------------------------

CREATE TABLE Position
(
       id_position NUMBER(6) NOT NULL,
       description VARCHAR2(20),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Position
      ADD CONSTRAINT pk_position_id PRIMARY KEY(id_position)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
-----------------------------------------------------

CREATE TABLE Align
(
       id_align NUMBER(6) NOT NULL,
       name_align VARCHAR2(20),
       fk_team_id NUMBER(6),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Align
      ADD CONSTRAINT pk_align_id PRIMARY KEY(id_align)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
--ForeingKey
ALTER TABLE Align
      ADD CONSTRAINT fk_teamAlign_id FOREIGN KEY(fk_team_id)
      REFERENCES Team(id_team);
-----------------------------------------------------

CREATE TABLE Match
(
       id_match NUMBER(6) NOT NULL,
       name_match VARCHAR2(20),
       start_date DATE,
       fk_teamOne_id NUMBER(6),
       fk_teamTwo_id NUMBER(6),
       fk_alignOne_id NUMBER(6),
       fk_alignTwo_id NUMBER(6),
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Match
      ADD CONSTRAINT pk_match_id PRIMARY KEY(id_match)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0);
--ForeingKey
ALTER TABLE Match
      ADD CONSTRAINT fk_teamOne_id FOREIGN KEY(fk_teamOne_id)
      REFERENCES Team(id_team);
--ForeingKey
ALTER TABLE Match
      ADD CONSTRAINT fk_teamTwo_id FOREIGN KEY(fk_teamTwo_id)
      REFERENCES Team(id_team);
--ForeingKey
ALTER TABLE Match
      ADD CONSTRAINT fk_alignOne_id FOREIGN KEY(fk_alignOne_id)
      REFERENCES Align(id_align);
--ForeingKey
ALTER TABLE Match
      ADD CONSTRAINT fk_alignTwo_id FOREIGN KEY(fk_alignTwo_id)
      REFERENCES Align(id_align);
-----------------------------------------------------

