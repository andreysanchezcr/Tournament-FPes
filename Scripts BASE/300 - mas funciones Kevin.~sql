CREATE OR REPLACE FUNCTION getSequenceactualevent
  RETURN number
  IS contador number(20);
  BEGIN
     return SEQ_EVENT.Currval;
  END;
  
CREATE OR REPLACE FUNCTION getSequenceactualgroupp
  RETURN number
  IS contador number(20);
  BEGIN
     return SEQ_GROUPP.Currval;
  END;


select * from groupp;

CREATE OR REPLACE FUNCTION getIDTeam(ciudad in varchar2)
RETURN Number
IS existe Number(6);
BEGIN
select ID_TEAM into existe from TEAM where TEAM.NAME_TEAM=ciudad;
return existe;
END;
                     

select * from Match;

CREATE OR REPLACE PROCEDURE get_AllTeams(p_recordset out sys_refcursor) as
begin
  open p_recordset for

  select team.name_team from team;
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_AllTeams;
CREATE OR REPLACE PROCEDURE insert_Event(nombre in varchar2,descc in varchar2,feInicio in varchar2,feFinal in varchar2,pGenero IN NUMBER)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO event(id_event,name_event,description,start_date,end_date,genero)
    VALUES(seq_event.nextval,nombre,descc,TO_DATE(feInicio,'mm/dd/yyyy'),TO_DATE(feFinal,'mm/dd/yyyy'),pGenero);
  COMMIT;
  tot_emps:=tot_emps-1;
END;


select * from event_x_team;

CREATE OR REPLACE PROCEDURE insert_Match(equipo1 in number,equipo2 in number,fecha in varchar2)
AS tot_emps NUMBER;
BEGIN
  INSERT INTO match(id_match,fk_teamone_id,fk_teamtwo_id,start_date)
    VALUES(seq_match.nextval,equipo1,equipo2,TO_DATE(fecha,'mm/dd/yyyy'));
  COMMIT;
  tot_emps:=tot_emps-1;
END;
