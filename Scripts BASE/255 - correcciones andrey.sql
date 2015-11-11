

CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select stadium.id_stadium,stadium.name_stadium,stadium.capasity,stadium.photo,stadium.description,stadium.fk_city_id from stadium
  where (stadium.fk_city_id=getIDCiudad(pais,ciudadd) or pais is null or pais='' or ciudadd is null or ciudadd='')  and (stadium.name_stadium like nombre || '%' or nombre is null or nombre='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;


CREATE OR REPLACE FUNCTION getIDCiudad(pais in varchar2,ciudad in varchar2)
RETURN number
IS id_ number(6);
BEGIN
   select city.id_city into id_ from City where city.name_city=ciudad and getIDCountry(pais)=city.fk_country_id;
   return id_;
END;






