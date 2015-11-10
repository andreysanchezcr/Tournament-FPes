DROP PROCEDURE get_all_players;
DROP PROCEDURE get_allplayers;



CREATE OR REPLACE PROCEDURE get_Players_Filtros(p_recordset out sys_refcursor,genero in number, equipo in number, nacionalidad in varchar2, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select id_player, first_name, last_name, Nickname, t_Shirt_Num, photo from player where ( fk_team_id=equipo or equipo is null) and ( genre=genero or genero is null) and ( fk_country_id=getIDPais(nacionalidad) or nacionalidad is null) AND
   first_name like nombre || '%' AND nickname like apellido || '%' AND
   last_name like apodo || '%';

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;

CREATE OR REPLACE FUNCTION getIDPais(nombre in varchar2)
RETURN NUMBER
IS idPais NUMBER(9);cantUsuario2 NUMBER(9);
BEGIN
   select id_country into idPais from country where country.name_country=nombre;

   return idPais;
END;



DROP PROCEDURE get_players_nombre;



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


