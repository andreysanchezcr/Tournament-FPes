DROP PROCEDURE get_all_players;
DROP PROCEDURE get_allplayers;


CREATE OR REPLACE PROCEDURE get_Players_Filtros(p_recordset out sys_refcursor,genero in varchar2, equipo in varchar2, nacionalidad in varchar2, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select id_player, first_name, last_name, Nickname, t_Shirt_Num, photo,getNombrePais(fk_country_id) from player where ( getIdEquipo(fk_team_id)=equipo or equipo is null or equipo ='') and ( genre=genero or(genre=0 and genero='H') or(genre=1 and genero='M') or genero is null or genero='' or genero='A') and ( fk_country_id=getIDPais(nacionalidad) or nacionalidad is null or nacionalidad='') AND
   (first_name like nombre || '%' or nombre is null or nombre='') AND (last_name like apellido || '%' or apellido is null or apellido ='') AND
   (Nickname like apodo || '%' or apodo is null or apodo ='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;

CREATE OR REPLACE FUNCTION getIdEquipo(nombre in varchar2)
RETURN Number
IS idPais Number(6);
BEGIN
   select team.id_team into idPais from team where name_team=nombre;

   return idPais;
END;

CREATE OR REPLACE FUNCTION getNombrePais(id_ in number)
RETURN varchar2
IS idPais varchar2(20);
BEGIN
   select name_country into idPais from country where country.id_country=id_;

   return idPais;
END;



CREATE OR REPLACE FUNCTION getIDPais(nombre in varchar2)
RETURN NUMBER
IS idPais NUMBER(9);cantUsuario2 NUMBER(9);
BEGIN
   select id_country into idPais from country where country.name_country=nombre;

   return idPais;
END;


CREATE OR REPLACE PROCEDURE get_paises_nombre(p_recordset out sys_refcursor,genero in number, equipo in number, nacionalidad in varchar2, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select country.name_country from country;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_paises_nombre;

CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select description,id_stadium,name_stadium,capasity,name_city,name_country from (select * from (Select description,id_stadium,name_stadium,capasity,photo,fk_city_id from Stadium )

   A full outer join (select city.id_city,city.name_city, city.fk_country_id from city) B on  A.FK_CITY_ID=B.ID_CITY   ) full outer join country
 on  fk_country_id=country.id_country where (pais=name_country or pais is null or pais='') and (name_stadium like nombre || '%' or nombre is null or nombre='')  and (name_city=ciudadd or ciudadd is null or ciudadd='');-- and (name_stadium like nombre || '%');
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;



CREATE OR REPLACE PROCEDURE infoMatch(p_recordset out sys_refcursor, partido in number) as
begin
  open p_recordset for
  
  select id_match,name_match,fk_teamone_id,fk_teamtwo_id,fk_alignone_id,fk_aligntwo_id from match where id_match=partido;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END infoMatch;

CREATE OR REPLACE PROCEDURE getNameTeam(p_recordset out sys_refcursor, id_ in number) as
begin
  open p_recordset for
  
  select name_team from team where id_team=id_;
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getNameTeam;



CREATE OR REPLACE FUNCTION getActionsinMatchAux(nombre in varchar2,id_partido in number, action in number)
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from action_x_player where action_x_player.fk_match_id=id_partido and action_x_player.fk_action_type_id=action;
   return cantidad;
END;


CREATE OR REPLACE PROCEDURE getNamesxPosition(p_recordset out sys_refcursor, alin in number,match in number) as
begin
  open p_recordset for
  

  select  description,first_name from (select description,fk_player_id from
  (select player_x_position.fk_position_id,player_x_position.fk_player_id from player_x_position where player_x_position.fk_align_id=match) A
  full outer join position B on A.FK_POSITION_ID=b.id_position) C full outer join player D on fk_player_id=id_player ;
  
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getNameTeam;

CREATE OR REPLACE FUNCTION getNameCountry(id_ in number)
RETURN varchar2
IS pais varchar2(20);
BEGIN

   select team.name_team into pais from team where team.id_team=id_;
   return pais;
END;


CREATE OR REPLACE FUNCTION contarAccionPlayerInPartido(id_jugador in number,id_partido in number,accion in number)
RETURN varchar2
IS contador number(20);
BEGIN

   select count(1) into contador from(action_x_player) where action_x_player.fk_action_type_id=accion and action_x_player.fk_player_id=id_jugador and action_x_player.fk_match_id=id_partido;
   
   return contador;
END;

CREATE OR REPLACE FUNCTION contarAccionPorEquipo(id_equipo in number,id_partido in number,accion in number)
RETURN varchar2
IS contador number(20);
BEGIN

   select sum(contarAccionPlayerInPartido(player_x_team.fk_player_id,id_partido,accion)) into contador from player_x_team where player_x_team.fk_team_id=id_equipo;
   

   return contador;
END;

CREATE OR REPLACE PROCEDURE getAcciones(p_recordset out sys_refcursor, equipo in number,partido in number) as
begin
  open p_recordset for

   select contarAccionPorEquipo(id_equipo	,id_partido,action_type.id_actiontype) as contador,Action_Type.Description from Action_Type;
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getAcciones;




CREATE OR REPLACE PROCEDURE getAcciones(p_recordset out sys_refcursor, equipo in number,partido in number) as
begin
  open p_recordset for
  

    select contarAccionPorEquipo(equipo	,partido,action_type.id_actiontype),Action_Type.Description from Action_Type;
  
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getAcciones;



CREATE OR REPLACE PROCEDURE getPotisions(p_recordset out sys_refcursor, equipo in number,match in number) as
begin
  open p_recordset for
  

    select 
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getStadistics;





CREATE OR REPLACE FUNCTION getPositionByIDP(id_ in number)
RETURN varchar2
IS nombre varchar(20);
BEGIN

   select position.description into nombre from position where position.id_position=id_;

   return nombre;
END;



CREATE OR REPLACE FUNCTION getNamePlayer(id_ in number)
RETURN varchar2
IS nombre varchar(20);
BEGIN

   select player.first_name into nombre from player where player.id_player=id_; 

   return nombre;
END;

CREATE OR REPLACE PROCEDURE getPotisions(p_recordset out sys_refcursor, alin in number) as
begin
  open p_recordset for


    select getPositionByIDP(player_x_position.fk_position_id) as posicion,getNamePlayer(player_x_position.fk_player_id) as nombre from player_x_position
    where player_x_position.fk_align_id=alin order by posicion asc;
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getPotisions;




CREATE OR REPLACE PROCEDURE getStadistics(p_recordset out sys_refcursor, alin in number,match in number) as
begin
  open p_recordset for
  

    select action_type.description, getActionsinMatchAux(0,action_type.id_actiontype) from action_type;
  
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getStadistics;






CREATE OR REPLACE PROCEDURE getNamesxPosition(p_recordset out sys_refcursor, alin in number,match in number) as
begin
  open p_recordset for
  

  select  description,first_name from (select description,fk_player_id from
  (select player_x_position.fk_position_id,player_x_position.fk_player_id from player_x_position where player_x_position.fk_align_id=match) A
  full outer join position B on A.FK_POSITION_ID=b.id_position) C full outer join player D on fk_player_id=id_player ;
  
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getNameTeam;


CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select description,id_stadium,name_stadium,capasity,name_city,name_country from (select * from (Select description,id_stadium,name_stadium,capasity,blobdata,fk_city_id from Stadium )

   A full outer join (select city.id_city,city.name_city, city.fk_country_id from city) B on  A.FK_CITY_ID=B.ID_CITY   ) full outer join country
 on  fk_country_id=country.id_country where (pais=name_country or pais is null or pais='') and (name_stadium like nombre || '%' or nombre is null or nombre='')  and (name_city=ciudadd or ciudadd is null or ciudadd='');-- and (name_stadium like nombre || '%');
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;


CREATE OR REPLACE PROCEDURE get_Player(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for

  Select * from (Select id_player,first_name,last_name,nickname,t_shirt_num,blobdata,fk_country_id as pais from player
  where id_player=id_) A
  full outer join (select country.id_country,country.name_country from country) B on A.PAIS=B.ID_COUNTRY ;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Player;


CREATE OR REPLACE PROCEDURE get_Stadium(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for

  select id_stadium,name_stadium,capasity,blobdata,name_city,name_country from (select * from (Select id_stadium,name_stadium,capasity,blobdata,fk_city_id from Stadium where stadium.id_stadium=id_)
   A full outer join (select city.id_city as ciudad,city.name_city, city.fk_country_id from city) B on A.FK_CITY_ID=B.CIUDAD   ) full outer join country
 on fk_country_id=country.id_country ;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Stadium;

create or replace procedure update_Stadium(id_ in number,a_nombre in varchar2,param2 in number,lugar in number,foto in blob,ciudad in number)
as tot_emps number;
begin
  update Stadium
  set Stadium.Name_Stadium=a_nombre,Stadium.Capasity=param2,stadium.blobdata=foto,stadium.fk_city_id=ciudad

  where stadium.id_stadium=id_;
  commit;
  tot_emps:=tot_emps-1;
end;

CREATE OR REPLACE PROCEDURE getNamesxPosition(p_recordset out sys_refcursor, alin in number,match in number) as
begin
  open p_recordset for


  select  description,first_name from (select description,fk_player_id from
  (select player_x_position.fk_position_id,player_x_position.fk_player_id from player_x_position where player_x_position.fk_align_id=match) A
  full outer join position B on A.FK_POSITION_ID=b.id_position) C full outer join player D on fk_player_id=id_player ;


  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getNamesxPosition;


CREATE OR REPLACE PROCEDURE getAcciones(p_recordset out sys_refcursor, equipo in number,partido in number) as
begin
  open p_recordset for


    select contarAccionPorEquipo(equipo	,partido,action_type.id_actiontype),Action_Type.Act_Name from Action_Type;


  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getAcciones;

CREATE OR REPLACE PROCEDURE get_Players_Filtros(p_recordset out sys_refcursor,genero in number, equipo in number, nacionalidad in varchar2, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select id_player, first_name, last_name, Nickname, t_Shirt_Num, photo,getNombrePais(fk_country_id) from player where ( fk_team_id=equipo or equipo is null or equipo ='') and ( genre=genero or genero is null or genero='') and ( fk_country_id=getIDPais(nacionalidad) or nacionalidad is null or nacionalidad='') AND
   (first_name like nombre || '%' or nombre is null or nombre='') AND (last_name like apellido || '%' or apellido is null or apellido ='') AND
   (Nickname like apodo || '%' or apodo is null or apodo ='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;

CREATE OR REPLACE PROCEDURE get_Players_Filtros(p_recordset out sys_refcursor,genero in number, equipo in VARCHAR2, nacionalidad in varchar2, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select id_player, first_name, last_name, Nickname, t_Shirt_Num, blobdata,getNombrePais(fk_country_id) from player where ( genre=genero or genero is null or genero='')and ( fk_country_id=getIDPais(nacionalidad) or nacionalidad is null or nacionalidad='') AND
   (first_name like nombre || '%' or nombre is null or nombre='') AND (last_name like apellido || '%' or apellido is null or apellido ='') AND
   (Nickname like apodo || '%' or apodo is null or apodo ='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;


CREATE OR REPLACE FUNCTION existeEquipo(nombre in varchar2)
RETURN Number
IS existe Number(6);
BEGIN
   select count(1) into existe from Player_x_Team where fk_team_id=GETIDEQUIPO(nombre);
   return existe;
END;
