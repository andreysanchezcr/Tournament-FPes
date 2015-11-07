CREATE OR REPLACE PROCEDURE insert_ActType(a_name IN VARCHAR2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Action_Type(Id_Actiontype,Name_Actiontype)
    VALUES(seq_acttype.nextval,a_name);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

CREATE OR REPLACE PROCEDURE insert_action_x_player(action in number,player in number,match in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO action_x_player(fk_action_type_id,fk_player_id,fk_match_id)
    VALUES(action,player,match);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

CREATE OR REPLACE PROCEDURE insert_Admin(usuario IN VARCHAR2, contrasenia in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Admin(Nick_Name,Password)
    VALUES(usuario,contrasenia);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_Align(a_name in varchar2, equipo in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO align(id_align,name_align,fk_team_id)
    VALUES(seq_align.nextval,a_name,equipo);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_Award(nombre in varchar2, descripcionn in varchar2,foto in blob,evento in number,jugador in number, equipo in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO award(id_award,name_award,description,photo,fk_event_id,fk_player_id,fk_team_id)
    VALUES(seq_award.nextval,nombre,descripcionn,foto,evento,jugador,equipo);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_City(nombre in varchar2, fk_country in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO city(id_city,name_city,fk_country_id)
    VALUES(seq_city.nextval,nombre,fk_country);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

CREATE OR REPLACE PROCEDURE insert_Country(nombre in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO country(id_country,name_country)
    VALUES(seq_country.nextval,nombre);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

CREATE OR REPLACE PROCEDURE insert_Event(nombre in varchar2,descc in varchar2,feInicio in date,feFinal in date)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO event(id_event,name_event,description,start_date,end_date)
    VALUES(seq_event.nextval,nombre,descc,feInicio,feFinal);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_EventxTeam(evento in number,equipo in number,grupo in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO event_x_team(fk_event_id,fk_team_id,fk_group_id)
    VALUES(evento,equipo,grupo);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_Groupp(nombre in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO groupp(id_group,name_group)
    VALUES(seq_groupp.nextval,nombre);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_Match(nombre in varchar2,equipo1 in number,equipo2 in number,alin1 in number,alin2 in number,fecha in date)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO match(id_match,name_match,fk_teamone_id,fk_teamtwo_id,fk_alignone_id,fk_aligntwo_id,start_date)
    VALUES(seq_match.nextval,nombre,equipo1,equipo2,alin1,alin2,fecha);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


CREATE OR REPLACE PROCEDURE insert_Parameter(nombre in varchar2,valor in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO parameter(parameter_id,parameter_name,parameter_value)
    VALUES(seq_parameter.nextval,nombre,valor);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

CREATE OR REPLACE PROCEDURE insert_PlayerxPos(posicion in number,player in number,alin in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO player_x_position(fk_position_id,fk_player_id,fk_align_id)
    VALUES(posicion,player,alin);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

CREATE OR REPLACE PROCEDURE insert_Position(descc in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO position(id_position,description)
    VALUES(seq_position.nextval,descc);
  COMMIT;
  tot_emps:=tot_emps-1;
END;



--Verificar los parametros que hacen falta
--Eliminar el campo place

CREATE OR REPLACE PROCEDURE insert_Stadium(nombre in varchar2,capacid in number,ciudad in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Stadium(Id_Stadium,Name_Stadium,Capasity,Fk_City_Id)
    VALUES(seq_stadium.nextval,nombre,capacid,ciudad);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

--Falta verificar la foto

CREATE OR REPLACE PROCEDURE insert_Team(nombre in varchar2, foto in blob, capitan in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO team(id_team,name_team,flag,fk_captain_id)
    VALUES(seq_team.nextval,nombre,foto,capitan);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

