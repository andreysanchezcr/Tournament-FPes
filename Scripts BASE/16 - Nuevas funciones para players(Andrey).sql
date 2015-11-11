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

insert into country(id_country,name_country)
values(20,'Francia');
commit;
