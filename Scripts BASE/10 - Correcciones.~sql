DROP PROCEDURE get_all_players;
DROP PROCEDURE get_allplayers;



CREATE OR REPLACE PROCEDURE get_Players_Filtros(p_recordset out sys_refcursor,genero in number, equipo in number, nacionalidad in number, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select id_player, first_name, last_name, Nickname, t_Shirt_Num, photo from player where ( fk_team_id=equipo or equipo is null) and ( genre=genero or genero is null) and ( fk_country_id=nacionalidad or nacionalidad is null) AND
   first_name like nombre || '%' AND nickname like apellido || '%' AND
   last_name like apodo || '%';

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;



DROP PROCEDURE get_players_nombre;
