Alter table TEAM
 DROP COLUMN FLAG;

CREATE table FLAG(
  id_flag        NUMBER(6) not null,
  BLOBDATA      BLOB,
  fec_creacion    DATE,
  creado_por      VARCHAR2(10),
  fec_ultima_mod  DATE,
  user_ultima_mod VARCHAR2(10)
)

alter table FLAG
add constraint PK_FLAG_ID primary key (id_flag)
using index 
tablespace LU_IND
pctfree 20
initrans 2
maxtrans 255
storage(
  initial 16K
  next 16K
  minextents 1
  maxextents unlimited
);

ALTER TABLE TEAM
 ADD FK_FLAG NUMBER(6);
 
alter table TEAM
  add constraint FK_flag_ID foreign key (FK_FLAG)
  references FLAG (id_flag);
  
create sequence SEQ_FLAG
minvalue 0
maxvalue 100000
start with 0
increment by 1
cache 20
order;


  CREATE OR REPLACE FUNCTION getSequenceflag
  RETURN number
  IS contador number(20);
  BEGIN
     return SEQ_FLAG.nextval;
  END;
  
CREATE OR REPLACE PROCEDURE insert_Stadium(nombre in varchar2,capacid in number,ciudad in number)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Stadium(Id_Stadium,Name_Stadium,Capasity,Fk_City_Id)
    VALUES(seq_stadium.nextval,nombre,capacid,ciudad);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


create or replace procedure update_ActType(id_ in number,a_nombre in varchar2)
as tot_emps number;
begin
  update Action_Type
  set action_type.act_name=a_nombre

  where Action_Type.Id_Actiontype=id_;
  commit;
  tot_emps:=tot_emps-1;
end;

CREATE OR REPLACE PROCEDURE insert_ActType(a_name IN VARCHAR2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO Action_Type(Id_Actiontype,Act_Name)
    VALUES(seq_acttype.nextval,a_name);
  COMMIT;
  tot_emps:=tot_emps-1;
END;

create or replace procedure update_Team(id_ in number,a_nombre in varchar2,param2 in number,bandera in blob,foto in blob,capitan in number)
as tot_emps number;
begin
  update team
  set team.name_team=a_nombre,team.fk_captain_id=capitan

  where team.id_team=id_;
  commit;
  tot_emps:=tot_emps-1;
end;

CREATE OR REPLACE PROCEDURE filtroEstadios(p_recordset out sys_refcursor, pais in varchar2, ciudadd in varchar2, nombre in varchar2) as
begin
  open p_recordset for

  select stadium.id_stadium,stadium.name_stadium,stadium.capasity,stadium.description,stadium.fk_city_id from stadium
  where (getIDCountry(pais)=getFkCity(ciudadd) or pais is null or pais='' or ciudadd is null or ciudadd='')  and (stadium.name_stadium like nombre || '%' or nombre is null or nombre='');

  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END filtroEstadios;

DROP PROCEDURE getstadistics;

CREATE OR REPLACE FUNCTION getSequenceteam
  RETURN number
  IS contador number(20);
  BEGIN
     return SEQ_TEAM.nextval;
  END;
  
