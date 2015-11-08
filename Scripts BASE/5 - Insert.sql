CREATE OR REPLACE PROCEDURE insert_ActType(a_name IN VARCHAR2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Action_Type(Id_Actiontype,Description)
    VALUES(seq_acttype.nextval,a_name);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

--Updates

create or replace procedure update_ActType(id_ in number,a_nombre in varchar2)
as tot_emps number;
begin
  update Action_Type
  set action_type.description=a_nombre

  where Action_Type.Id_Actiontype=id_;
  commit;
  tot_emps:=tot_emps-1;
end;




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


--Updates

create or replace procedure update_Admin(id_ in number,a_nombre in varchar2)
as tot_emps number;
begin
  update admin
  set admin.password=a_nombre

  where admin.password=id_;
  commit;
  tot_emps:=tot_emps-1;
end;





CREATE OR REPLACE PROCEDURE insert_Align(a_name in varchar2, equipo in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO align(id_align,name_align,fk_team_id)
    VALUES(seq_align.nextval,a_name,equipo);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

--Updates

create or replace procedure update_Align(id_ in number,a_nombre in varchar2,param2 in number)
as tot_emps number;
begin
  update Align
  set align.name_align=a_nombre,align.fk_team_id=param2

  where align.id_align=id_;
  commit;
  tot_emps:=tot_emps-1;
end;




CREATE OR REPLACE PROCEDURE insert_Award(nombre in varchar2, descripcionn in varchar2,foto in blob,evento in number,jugador in number, equipo in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO award(id_award,name_award,description,photo,fk_event_id,fk_player_id,fk_team_id)
    VALUES(seq_award.nextval,nombre,descripcionn,foto,evento,jugador,equipo);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

--Updates

create or replace procedure update_Award(id_ in number,nombre in varchar2, descripcionn in varchar2,foto in blob,evento in number,jugador in number, equipo in number)
as tot_emps number;
begin
  update Award
  set award.name_award=nombre,award.description=descripcionn,award.photo=foto,award.fk_event_id=evento,award.fk_player_id=jugador,award.fk_team_id=equipo

  where award.id_award=id_;
  commit;
  tot_emps:=tot_emps-1;
end;









CREATE OR REPLACE PROCEDURE insert_City(nombre in varchar2, fk_country in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO city(id_city,name_city,fk_country_id)
    VALUES(seq_city.nextval,nombre,fk_country);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


create or replace procedure update_City(id_ in number,a_nombre in varchar2,param2 in number)
as tot_emps number;
begin
  update city
  set city.name_city=a_nombre,city.fk_country_id=param2

  where city.id_city=id_;
  commit;
  tot_emps:=tot_emps-1;
end;






CREATE OR REPLACE PROCEDURE insert_Country(nombre in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO country(id_country,name_country)
    VALUES(seq_country.nextval,nombre);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

create or replace procedure update_Country(id_ in number,a_nombre in varchar2,param2 in number)
as tot_emps number;
begin
  update country
  set country.name_country=a_nombre

  where country.id_country=id_;
  commit;
  tot_emps:=tot_emps-1;
end;






CREATE OR REPLACE PROCEDURE insert_Event(nombre in varchar2,descc in varchar2,feInicio in varchar2,feFinal in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO event(id_event,name_event,description,start_date,end_date)
    VALUES(seq_event.nextval,nombre,descc,TO_DATE(feInicio,'yyyy/mm/dd'),TO_DATE(feFinal,'yyyy/mm/dd'));
  COMMIT;
  tot_emps:=tot_emps-1;
END;








create or replace procedure update_Event(id_ in number,a_nombre in varchar2,param2 in number,param3 in varchar2,param4 in varchar2,param5 in varchar2)
as tot_emps number;
begin
  update Event
  set event.name_event=a_nombre,event.description=param3,event.start_date=TO_DATE(param4,'yyyy/mm/dd'),event.end_date=TO_DATE(param5,'yyyy/mm/dd')

  where event.id_event=id_;
  commit;
  tot_emps:=tot_emps-1;
end;




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

create or replace procedure update_Groupp(id_ in number,a_nombre in varchar2,param2 in number)
as tot_emps number;
begin
  update Groupp
  set groupp.name_group=a_nombre

  where groupp.id_group=id_;
  commit;
  tot_emps:=tot_emps-1;
end;






CREATE OR REPLACE PROCEDURE insert_Match(nombre in varchar2,equipo1 in number,equipo2 in number,alin1 in number,alin2 in number,fecha in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO match(id_match,name_match,fk_teamone_id,fk_teamtwo_id,fk_alignone_id,fk_aligntwo_id,start_date)
    VALUES(seq_match.nextval,nombre,equipo1,equipo2,alin1,alin2,TO_DATE(fecha,'yyyy/mm/dd hh24:mi:ss'));
  COMMIT;
  tot_emps:=tot_emps-1;
END;



create or replace procedure update_Match(id_ in number,a_nombre in varchar2,param2 in varchar2,equipo1 in number,equipo2 in number,alin1 in number,alin2 in number)
as tot_emps number;
begin
  update match
  set match.name_match=a_nombre,match.start_date=TO_DATE(param2,'yyyy/mm/dd hh24:mi:ss'),match.fk_teamone_id=equipo1,match.fk_teamtwo_id=equipo2
  ,match.fk_alignone_id=alin1
  ,match.fk_aligntwo_id=alin2

  where match.id_match=id_;
  commit;
  tot_emps:=tot_emps-1;
end;




CREATE OR REPLACE PROCEDURE insert_Parameter(nombre in varchar2,valor in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO parameter(parameter_id,parameter_name,parameter_value)
    VALUES(seq_parameter.nextval,nombre,valor);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

create or replace procedure update_Parameter(id_ in number,a_nombre in varchar2,param2 in number)
as tot_emps number;
begin
  update Parameter
  set Parameter.Parameter_Name=a_nombre,Parameter.Parameter_Value=param2

  where Parameter.Parameter_Id=id_;
  commit;
  tot_emps:=tot_emps-1;
end;





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

create or replace procedure update_Position(id_ in number,a_nombre in varchar2)
as tot_emps number;
begin
  update Position
  set Position.Description=a_nombre

  where Position.Id_Position=id_;
  commit;
  tot_emps:=tot_emps-1;
end;





CREATE OR REPLACE PROCEDURE insert_Stadium(nombre in varchar2,capacid in number,ciudad in number, foto in  blob)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Stadium(Id_Stadium,Name_Stadium,Capasity,Fk_City_Id,Photo)
    VALUES(seq_stadium.nextval,nombre,capacid,ciudad,foto);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


create or replace procedure update_Stadium(id_ in number,a_nombre in varchar2,param2 in number,lugar in number,foto in blob,ciudad in number)
as tot_emps number;
begin
  update Stadium
  set Stadium.Name_Stadium=a_nombre,Stadium.Capasity=param2,stadium.photo=foto,stadium.fk_city_id=ciudad

  where stadium.id_stadium=id_;
  commit;
  tot_emps:=tot_emps-1;
end;


CREATE OR REPLACE PROCEDURE insert_Team(nombre in varchar2, foto in blob, capitan in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO team(id_team,name_team,flag,fk_captain_id)
    VALUES(seq_team.nextval,nombre,foto,capitan);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

create or replace procedure update_Team(id_ in number,a_nombre in varchar2,param2 in number,bandera in blob,foto in blob,capitan in number)
as tot_emps number;
begin
  update team
  set team.name_team=a_nombre,team.flag=bandera,team.photo=foto,team.fk_captain_id=capitan

  where team.id_team=id_;
  commit;
  tot_emps:=tot_emps-1;
end;




  




