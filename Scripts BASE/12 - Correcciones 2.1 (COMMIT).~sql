ALTER TABLE Player
      DROP COLUMN PHOTO;
      
ALTER TABLE Player
      ADD BLOBDATA BLOB;
      
CREATE OR REPLACE FUNCTION getSequencePlayer
RETURN number
IS contador number(20);
BEGIN
   return seq_player.nextval;
END;
      
select * from player;
