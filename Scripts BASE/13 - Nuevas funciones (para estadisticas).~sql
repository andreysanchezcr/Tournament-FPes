CREATE OR REPLACE FUNCTION countMen
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from Player where Genre=0;
   return cantidad;
END;

CREATE OR REPLACE FUNCTION countWomen
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from Player where Genre=1;
   return cantidad;
END;

CREATE OR REPLACE FUNCTION countTeam
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from Team;
   return cantidad;
END;

CREATE OR REPLACE FUNCTION countMatch
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from Match;
   return cantidad;
END;

CREATE OR REPLACE FUNCTION countEvent
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from Event;
   return cantidad;
END;

CREATE OR REPLACE FUNCTION countAction(accion_id IN VARCHAR2)
RETURN NUMBER
IS cantidad NUMBER(9);
BEGIN
   select count(1) into cantidad from Action_x_Player where Fk_Action_Type_Id=accion_id;
   return cantidad;
END;

ALTER TABLE ACTION_TYPE
      DROP COLUMN DESCRIPTION;
      
ALTER TABLE ACTION_TYPE
      ADD ACT_NAME VARCHAR2(20);
      
CREATE OR REPLACE PROCEDURE get_AllActions(p_recordset out sys_refcursor) as
begin
  open p_recordset for
  select id_actiontype,act_name from action_type;
  exception
    when NO_DATA_FOUND THEN
      NULL;
      WHEN OTHERS THEN
        RAISE;
END get_AllActions;
