---------obtener jugador en un equipo
CREATE OR REPLACE PROCEDURE  get_Team_P(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  Select player.first_name,player.last_name,player.photo from player where player.fk_team_id=id_;

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
  
  Select award.name_award from Award where award.fk_team_id=id_;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Team_Award;



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

---------Obtener todos los paises
CREATE OR REPLACE PROCEDURE  get_Countries(p_recordset out sys_refcursor,id_ in number) as
begin
  open p_recordset for
  
  Select country.name_country from country;

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
  
  Select city.name_city where city.fk_country_id=id_;

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

  select name_stadium,capasity,photo,name_city,name_country from (select * from (Select stadium.name_stadium,stadium.capasity,stadium.photo,stadium.fk_city_id from stadium where stadium.id_stadium=id_)
   A full outer join (select city.id_city as ciudad,city.name_city, city.fk_country_id from city) B on A.FK_CITY_ID=B.CIUDAD   ) full outer join country 
 on fk_country_id=country.id_country ;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Stadium;

---------obtener jugador en un equipo
CREATE OR REPLACE PROCEDURE  get_all_Players(p_recordset out sys_refcursorr) as
begin
  open p_recordset for
  
  Select player.first_name,player.last_name,player.photo from player;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Team_P;

-----Buscar todos los jugadores que cumplan con el nombre, apellido o nickname
-----Si se quiere obtener todos los jugadores el parametro se manda con comillas

CREATE OR REPLACE PROCEDURE get_Players_Nombre(p_recordset out sys_refcursor,nombre in varchar2) as
begin
  open p_recordset for

  Select player.first_name,player.last_name,player.photo from player where player.first_name like nombre || '%' or player.nickname like nombre || '%' or
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
  
  Select player.first_name,player.last_name,player.photo from player where (player.fk_team_id=equipo or equipo is null) and (player.genre=genero or genero is null) and (player.fk_country_id=nacionalidad or nacionalidad is null);

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;







