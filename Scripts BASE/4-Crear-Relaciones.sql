CREATE TABLE Event_X_Team
(
       --ForeingKey
       fk_event_id  NUMBER(6) NOT NULL,
       fk_team_id    NUMBER(6) NOT NULL,
       fk_group_id    NUMBER(6) NOT NULL,
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Event_X_Team
      ADD CONSTRAINT pk_event_x_group_id PRIMARY KEY(fk_event_id,fk_team_id,fk_group_id)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0); 
--ForeingKey
ALTER TABLE Event_X_Team
      ADD CONSTRAINT fk_teamEvent_id FOREIGN KEY(fk_team_id)
      REFERENCES Team(id_team);
ALTER TABLE Event_X_Team
      ADD CONSTRAINT eventTeam FOREIGN KEY(fk_event_id)
      REFERENCES Event(id_event);
ALTER TABLE Event_X_Team
      ADD CONSTRAINT groupEvent FOREIGN KEY(fk_group_id)
      REFERENCES Groupp(id_group);
--------------------------------------------------------- 

CREATE TABLE Action_X_Player
(
       --ForeingKey
       fk_action_type_id  NUMBER(6) NOT NULL,
       fk_player_id    NUMBER(6) NOT NULL,
       fk_match_id    NUMBER(6) NOT NULL,
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Action_X_Player
      ADD CONSTRAINT pk_action_player_id PRIMARY KEY(fk_action_type_id,fk_player_id,fk_match_id)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0); 
--ForeingKey
ALTER TABLE Action_X_Player
      ADD CONSTRAINT fk_action_type_id FOREIGN KEY(fk_action_type_id)
      REFERENCES Action_Type(id_actionType);
ALTER TABLE Action_X_Player
      ADD CONSTRAINT fk_Action_x_player_id FOREIGN KEY(fk_player_id)
      REFERENCES Player(id_player);
ALTER TABLE Action_X_Player
      ADD CONSTRAINT fk_action_x_match_id FOREIGN KEY(fk_match_id)
      REFERENCES Match(id_match);
--------------------------------------------------------- 

CREATE TABLE Player_X_Position
(
       --ForeingKey
       fk_position_id  NUMBER(6) NOT NULL,
       fk_player_id    NUMBER(6) NOT NULL,
       fk_align_id    NUMBER(6) NOT NULL,
       --Campos de Auditoria
       fec_creacion    DATE, 
       creado_por      VARCHAR2(10),
       fec_ultima_mod  DATE,
       user_ultima_mod VARCHAR2(10)
);
--PrimaryKey
ALTER TABLE Player_X_Position
      ADD CONSTRAINT pk_player_x_position_id PRIMARY KEY(fk_position_id,fk_player_id,fk_align_id)
      USING INDEX
      TABLESPACE lu_ind PCTFREE 20
      STORAGE(INITIAL 10K NEXT 10K PCTINCREASE 0); 
--ForeingKey
ALTER TABLE Player_X_Position
      ADD CONSTRAINT fk_position_id FOREIGN KEY(fk_position_id)
      REFERENCES Position(id_position);
ALTER TABLE Player_X_Position
      ADD CONSTRAINT fk_player_x_position_id FOREIGN KEY(fk_player_id)
      REFERENCES Player(id_player);
ALTER TABLE Player_X_Position
      ADD CONSTRAINT fk_position_x_align_id FOREIGN KEY(fk_align_id)
      REFERENCES Align(id_align);
--------------------------------------------------------- 

