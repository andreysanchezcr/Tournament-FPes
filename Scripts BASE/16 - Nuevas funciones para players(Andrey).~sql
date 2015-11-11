CREATE OR REPLACE PROCEDURE get_Countries(p_recordset out sys_refcursor) as
begin
  open p_recordset for
  Select name_country from country;

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Countries;

CREATE OR REPLACE FUNCTION getIdEquipo(nombre in varchar2)
RETURN Number
IS idPais Number(6);
BEGIN
   select team.id_team into idPais from team where name_team=nombre;

   return idPais;
END;




CREATE OR REPLACE PROCEDURE get_TeamsFiltro(p_recordset out sys_refcursor, namee in varchar2) as
begin
  open p_recordset for
  select id_team,name_team,fk_flag from team where (team.name_team like namee || '%' or namee is null or namee ='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_TeamsFiltro;

SELECT * FROM flag;
