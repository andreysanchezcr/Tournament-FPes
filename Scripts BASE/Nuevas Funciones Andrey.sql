CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select stadium.id_stadium,stadium.name_stadium,stadium.capasity,stadium.descripcion,stadium.fk_city_id from stadium
  where (getIDCountry(pais)=getFkCity(ciudadd) or pais is null or pais='' or ciudadd is null or ciudadd='')  and (stadium.name_stadium like nombre || '%' or nombre is null or nombre='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;

CREATE OR REPLACE FUNCTION getIDCountry(pais in varchar2)
RETURN NUMBER
IS cantidad NUMBER(6);
BEGIN
   select country.id_country into cantidad from country where country.name_country=pais;
   return cantidad;
END;


CREATE OR REPLACE FUNCTION getFkCity(ciudad in varchar2)
RETURN NUMBER
IS cantidad NUMBER(6);
BEGIN
   select city.fk_country_id into cantidad from city where city.name_city=ciudad;
   return cantidad;
END;






CREATE OR REPLACE PROCEDURE getInfoEvents(p_recordset out sys_refcursor,generoo in number) as
begin
  open p_recordset for

  select id_event,name_event,start_date,end_date from event where genero=generoo;


  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getInfoEvents;

-- Se pasa por parametro el ID del evento
CREATE OR REPLACE FUNCTION getPhotoAward(evento in number)
RETURN blob
IS foto blob;
BEGIN
   select award.photo into foto from award where award.fk_event_id=evento;
   return foto;
END;












CREATE OR REPLACE PROCEDURE getTotalPartidos(p_recordset out sys_refcursor, evento in number, equipo in number) as
begin
  open p_recordset for

  select id_event,name_event,start_date,end_date from event where genero=generoo;


  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getInfoEvents;

drop procedure getTotalPartidos;

CREATE OR REPLACE FUNCTION getTotalPartidos(evento in number, equipo in number)
RETURN number
IS total number;
BEGIN
   select count(1) into total from match where (fk_teamone_id=equipo or fk_teamtwo_id=equipo)
    and fk_event=evento;

   return total;
END;




CREATE OR REPLACE FUNCTION getGxJEnPartido(jugador in number,match in number)
RETURN number
IS total number;
BEGIN
   select count(1) into total 
   from action_x_player 
   where fk_player_id=jugador and fk_match_id=match and fk_action_type_id=0;
   return total;
END;


CREATE OR REPLACE FUNCTION getGxEquipoEnPartido(equipo in number,match in number)
RETURN number
IS total number;
BEGIN
   select sum(getGxJEnPartido(fk_player_id,match))
   into total from player_x_team where fk_team_id=equipo;


   return total;
END;


CREATE OR REPLACE FUNCTION getPartidoenEvento(equipo in number,evento in number)
RETURN number
IS total number;
BEGIN
   select sum(getGxEquipoEnPartido(equipo,match.id_match)) into total
    from match where (fk_teamone_id=equipo or fk_teamtwo_id=equipo) and fk_event=evento;

   return total;
END;









CREATE OR REPLACE FUNCTION getPartidoenEventoContra(equipo in number,evento in number)
RETURN number
IS total number;
BEGIN
   select sum(getGxEquipoEnPartido(getContrario(equipo,match.id_match),match.id_match)) into total
    from match where (fk_teamone_id=equipo or fk_teamtwo_id=equipo) and fk_event=evento;

   return total;
END;




CREATE OR REPLACE FUNCTION getContrario(equipo in number,matchh in number)
RETURN number
IS total number;
BEGIN
   select match.fk_teamone_id into total from match where match.id_match=matchh;


   IF total!=equipo THEN
   
   return total;
ELSE
    select match.fk_teamtwo_id into total from match where match.id_match=matchh;
    return total;
   

END IF;
   return total;
END;

CREATE OR REPLACE FUNCTION getGanados(equipo in number,evento in number)
RETURN number
IS total number;
BEGIN

   select count(1) into total from match where getGxEquipoEnPartido(equipo,match.id_match) 
   > 
   getGxEquipoEnPartido(getContrario(equipo,match.id_match),match.id_match);
   return total;
END;

CREATE OR REPLACE FUNCTION getPerdidos(equipo in number,evento in number)
RETURN number
IS total number;
BEGIN

   select count(1) into total from match where getGxEquipoEnPartido(equipo,match.id_match) 
   < 
   getGxEquipoEnPartido(getContrario(equipo,match.id_match),match.id_match);
   return total;
END;

CREATE OR REPLACE FUNCTION getEmpate(equipo in number,evento in number)
RETURN number
IS total number;
BEGIN

   select count(1) into total from match where getGxEquipoEnPartido(equipo,match.id_match) 
   = 
   getGxEquipoEnPartido(getContrario(equipo,match.id_match),match.id_match);
   return total;
END;


CREATE OR REPLACE FUNCTION getDiferencia(equipo in number,evento in number)
RETURN number
IS total number;
BEGIN

   select sum((getGxEquipoEnPartido(equipo,match.id_match)-getGxEquipoEnPartido(getContrario(equipo,match.id_match),match.id_match)))
    into total from match where (fk_teamone_id=equipo or fk_teamtwo_id=equipo) and fk_event=evento;

   return total;
END;




select getDiferencia(0,103) from player;



select * from action_x_player;


select getPartidoenEventoContra(0,103) from player;

select getPartidoenEvento(0,103) from player;






select * from action_x_player;





select * from action_x_player;


select * from match;

insert into action_x_player(fk_action_type_id,fk_player_id,fk_match_id)
values(0,1,110);
commit;

select * from player_x_team;


insert into action_type(id_actiontype,description)
values(1,'Amarilla');
commit;



insert into event(id_event,name_event)
values(103,'Un evento');
commit;


insert into match(id_match,fk_teamone_id,fk_teamtwo_id,fk_event)
values(110,0,1,103);
commit;

insert into match(id_match,fk_teamone_id,fk_teamtwo_id,fk_event)
values(101,1,0,100);
commit;

select * from event_x_team;


alter table match
add fk_event number(6);


CREATE OR REPLACE PROCEDURE getEquiposxGrupoxEvento(p_recordset out sys_refcursor, evento in number) as
begin
  open p_recordset for

  select fk_team_id,fk_group_id from event_x_team where fk_event_id=evento;
  

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getEquiposxGrupoxEvento;




CREATE OR REPLACE FUNCTION getNameTeamById(id_ in number)
RETURN varchar2
IS nombre varchar2(20);
BEGIN

   select name_team into nombre from team where id_team=id_;
   
   return nombre;
END;



CREATE OR REPLACE PROCEDURE getInfoEventsById(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for

  select id_event,name_event,start_date,end_date from event where id_event=id_;


  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getInfoEventsById;




BEGIN
DBMS_SCHEDULER.create_job(
  job_name => 'Job1',
  job_type => 'PLSQL_BLOCK',
  job_action => 'BEGIN respaldarInfoEstadistica;END;',
  start_date => SYSTIMESTAMP,
  repeat_interval => 'freq=daily',
  end_date => NULL,
  enabled => true,
  comments => 'Respalda informacion sobre grupos'
);
END; --



grant execute ON dbms_scheduler to ge;
grant create job to ge;

CREATE OR REPLACE PROCEDURE insert_Match(equipo1 in number,equipo2 in number,fecha in varchar2,idEvento IN NUMBER)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO match(id_match,fk_teamone_id,fk_teamtwo_id,start_date,fk_event)
    VALUES(seq_match.nextval,equipo1,equipo2,TO_DATE(fecha,'mm/dd/yyyy'),idEvento);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

select * from event_x_team;
select * from action_type;
select * from match;
insert into action_type(id_actiontype,act_name)
values(0,'Falta');

