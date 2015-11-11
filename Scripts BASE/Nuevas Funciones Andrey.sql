
CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select stadium.id_stadium,stadium.name_stadium,stadium.capasity,stadium.photo,stadium.description,stadium.fk_city_id from stadium
  where (getIDCountry(pais)=getFkCity(ciudadd) or pais is null or pais='' or ciudadd is null or ciudadd='')  and (stadium.name_stadium like nombre || '%' or nombre is null or nombre='');
  
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;


CREATE OR REPLACE FUNCTION getIDCountry(pais in varchar2)
RETURN NUMBER
IS cantidad NUMBER(6);
BEGIN
   select country.id_country into cantidad from country where country.name_country=pais;
   return cantidad;
END;


CREATE OR REPLACE FUNCTION getFkCity(ciudad in varchar2)
RETURN NUMBER
IS cantidad NUMBER(6);
BEGIN
   select city.fk_country_id into cantidad from city where city.name_city=ciudad;
   return cantidad;
END;






CREATE OR REPLACE PROCEDURE getInfoEvents(p_recordset out sys_refcursor,generoo in number) as
begin
  open p_recordset for

  select id_event,name_event,start_date,end_date from event where genero=generoo;


  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END getInfoEvents;

-- Se pasa por parametro el ID del evento
CREATE OR REPLACE FUNCTION getPhotoAward(evento in number)
RETURN blob
IS foto blob;
BEGIN
   select award.photo into foto from award where award.fk_event_id=evento;
   return foto;
END;

insert into event(id_event,name_event,start_date,end_date,genero)
values(1,'Nombre del evento',TO_DATE('01-03-2011','DD-MM-YYYY'),TO_DATE('01-03-2015','DD-MM-YYYY'),1);
commit;

select * from event;


alter table event
add genero number(1);



insert into match(


