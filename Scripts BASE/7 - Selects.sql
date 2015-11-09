---------obtener jugadores en un equipo
CREATE OR REPLACE PROCEDURE  get_Team_P(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  Select player.id_player,player.first_name,player.last_name,player.photo from player where player.fk_team_id=id_;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Team_P;

------------Obtener premios de un equipo
CREATE OR REPLACE PROCEDURE  get_Team_Award(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  Select award.id_award,award.name_award from Award where award.fk_team_id=id_;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Team_Award;


---------Obtener todos los paises
CREATE OR REPLACE PROCEDURE  get_Countries(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  Select country.id_country,country.name_country from country;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Countries;

---------Obtener todos las ciudades de un pais
CREATE OR REPLACE PROCEDURE  get_City_in_Country(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  Select city.id_city,city.name_city from City where city.fk_country_id=id_;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_City_in_Country;

--Obtener toda la informacion de un jugador
CREATE OR REPLACE PROCEDURE get_Player(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for

  Select * from (Select player.id_player,player.first_name,player.last_name,player.nickname,player.fk_team_id,player.t_shirt_num,player.photo,player.fk_country_id as pais from player
  where player.fk_country_id=id_) A
  full outer join (select country.id_country,country.name_country from country) B on A.PAIS=B.ID_COUNTRY ;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Player;



--Obtener toda la informacion de un estadio
CREATE OR REPLACE PROCEDURE get_Stadium(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for

  select id_stadium,name_stadium,capasity,photo,name_city,name_country from (select * from (Select id_stadium,name_stadium,capasity,photo,fk_city_id from Stadium where stadium.id_stadium=id_)
   A full outer join (select city.id_city as ciudad,city.name_city, city.fk_country_id from city) B on A.FK_CITY_ID=B.CIUDAD   ) full outer join country 
 on fk_country_id=country.id_country ;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Stadium;

---------obtener jugador en un equipo
CREATE OR REPLACE PROCEDURE  get_all_Players(p_recordset out sys_refcursor) as
begin
  open p_recordset for
  
  Select player.id_player,player.first_name,player.last_name,player.photo from player;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_all_Players;

-----Buscar todos los jugadores que cumplan con el nombre, apellido o nickname
-----Si se quiere obtener todos los jugadores el parametro se manda con comillas

CREATE OR REPLACE PROCEDURE get_Players_Nombre(p_recordset out sys_refcursor,nombre in varchar2) as
begin
  open p_recordset for

  Select player.id_player,player.first_name,player.last_name,player.photo from player where player.first_name like nombre || '%' or player.nickname like nombre || '%' or
  player.last_name like nombre || '%';

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Nombre;



----hombre = 1, mujer = 0



CREATE OR REPLACE PROCEDURE  get_Players_Filtros(p_recordset out sys_refcursor,genero in number, equipo in number, nacionalidad in number) as
begin
  open p_recordset for
  
  Select player.id_player,player.first_name,player.last_name,player.photo from player where (player.fk_team_id=equipo or equipo is null) and (player.genre=genero or genero is null) and (player.fk_country_id=nacionalidad or nacionalidad is null);

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;




---------Obtener todos los partidos en una fecha
CREATE OR REPLACE PROCEDURE get_match(p_recordset out sys_refcursor,fecha in varchar2) as
begin
  open p_recordset for

  Select match.id_match,match.name_match,to_char(match.start_date,'HH24:mm'),match.fk_teamone_id,match.fk_teamtwo_id from match where to_char(match.start_date,'yyyy/mm/dd')=fecha;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_match;


---------Obtener Estadisticas de un partido en especifico(id)
CREATE OR REPLACE PROCEDURE get_matchStadistics(p_recordset out sys_refcursor,id_accion in number) as
begin
  open p_recordset for

  Select count(action_x_player.fk_action_type_id) from action_x_player where action_x_player.fk_action_type_id=id_accion;
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_matchStadistics;



---------Obtener Timeline de un partido
CREATE OR REPLACE PROCEDURE get_timeLine(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for

  select fk_action_type_id,fk_player_id from Action_x_player where id_=action_x_player.fk_match_id;
  
  
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_timeLine;

---------Obtener todas las acciones
CREATE OR REPLACE PROCEDURE get_AllActions(p_recordset out sys_refcursor) as
begin
  open p_recordset for

  select action_type.id_actiontype,action_type.description from action_type;
  
  
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_AllActions;


---------Obtener todos los jugadores
CREATE OR REPLACE PROCEDURE get_AllPlayers(p_recordset out sys_refcursor) as
begin
  open p_recordset for

  select id_player,first_name,last_name,nickname, fk_team_id from player;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_AllPlayers;


---------Obtener todos los paises
CREATE OR REPLACE PROCEDURE get_AllCountries(p_recordset out sys_refcursor) as
begin
  open p_recordset for

  select country.id_country,country.name_country from country;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_AllCountries;

---------------------


CREATE OR REPLACE PROCEDURE  get_Stadiums_in_event(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  ---FAlta agregar esta funcion

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Stadiums_in_event;
