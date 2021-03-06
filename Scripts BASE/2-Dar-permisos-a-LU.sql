-- Conectado desde System
CREATE USER lu
       IDENTIFIED BY lu
       DEFAULT TABLESPACE LU_Data
       QUOTA 10M ON LU_Data
       TEMPORARY TABLESPACE temp
       QUOTA 5M ON system ;
       -- PROFILE app_user
       -- PASSWORD EXPIRE;
-----------------------------------------------
create ROLE LU
 IDENTIFIED BY lu;
 ----------------------------------------------
 GRANT CONNECT TO lu;
 ----------------------------------------------
 --GRANT EXECUTE on shema.procedure TO username;
 ----------------------------------------------
 grant create public synonym to LU;
 ----------------------------------------------
 grant create session to LU;
 grant create table to LU; 
 
 grant create any index to LU;
 grant unlimited tablespace to LU;
 grant create view to LU;
 
 grant create procedure to LU;
 grant create TRIGGER to LU;
 grant create SEQUENCE to LU;
