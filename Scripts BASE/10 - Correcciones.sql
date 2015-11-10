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

