CREATE OR REPLACE PROCEDURE get_Players_Filtros(p_recordset out sys_refcursor,genero in number , nacionalidad in varchar2, nombre in varchar2, apellido in varchar2, apodo in varchar2) as
begin
  open p_recordset for
  Select id_player, first_name, last_name, Nickname, t_Shirt_Num, blobdata,getNombrePais(fk_country_id) from player where ( genre=genero or genero is null or genero='') and ( fk_country_id=getIDPais(nacionalidad) or nacionalidad is null or nacionalidad='') AND
   (first_name like nombre || '%' or nombre is null or nombre='') AND (last_name like apellido || '%' or apellido is null or apellido ='') AND
   (Nickname like apodo || '%' or apodo is null or apodo ='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_Players_Filtros;


CREATE OR REPLACE FUNCTION existeEquipo(nombre in varchar2, idJugador IN NUMBER)
RETURN Number
IS existe Number(6);
BEGIN
   select count(1) into existe from Player_x_Team where fk_team_id=GETIDEQUIPO(nombre) AND idJugador=Fk_Player_Id;
   return existe;
END;

SELECT * FROM PLAYER;

select * from stadium;


CREATE OR REPLACE FUNCTION getIDCity(ciudad in varchar2, pais IN VARCHAR2)
RETURN Number
IS existe Number(6);
BEGIN
   select Id_City into existe from City where name_city=ciudad AND fk_country_id=GETIDPAIS(pais);
   return existe;
END;


CREATE OR REPLACE FUNCTION getSequencestadium
  RETURN number
  IS contador number(20);
  BEGIN
     return SEQ_STADIUM.nextval;
  END;
  
  
select * from stadium;

ALTER TABLE STADIUM
 DROP COLUMN DESCRIPTION;
 
ALTER TABLE STADIUM
ADD DESCRIPCION VARCHAR(200);


CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select stadium.id_stadium,stadium.name_stadium,stadium.capasity,stadium.DESCRIPCION,stadium.fk_city_id from stadium
  where (getIDCountry(pais)=getFkCity(ciudadd) or pais is null or pais='' or ciudadd is null or ciudadd='')  and (stadium.name_stadium like nombre || '%' or nombre is null or nombre='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;
