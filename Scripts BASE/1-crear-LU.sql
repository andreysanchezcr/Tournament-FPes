-- LU: DATA
CREATE TABLESPACE LU_Data
       DATAFILE 'C:\app\KEVIN\oradata\dbprueba\ludata01.dbf'
       SIZE 10M
       REUSE
       AUTOEXTEND ON
       NEXT 512K
       MAXSIZE 200M;
--
-- LU: INDEX
CREATE TABLESPACE LU_Ind
       DATAFILE 'C:\app\KEVIN\oradata\dbprueba\luind01.dbf'
       SIZE 10M
       REUSE
       AUTOEXTEND ON
       NEXT 512K
       MAXSIZE 200M;
