drop table users cascade constraints;

create table users (
  user_id varchar2(8) PRIMARY KEY NOT NULL,
  password varchar2(255) NOT NULL,
  default_password varchar2(255) NOT NULL,
  user_type int NOT NULL
);

insert into users (user_id, password, default_password, user_type) 
values ('datpham', 
        '$2y$10$oB2rsAdnFacfo8pLrNmPteZBni3eEvCLyrDd.eFOFK/aCpMRrSXwO', 
        '$2y$10$oB2rsAdnFacfo8pLrNmPteZBni3eEvCLyrDd.eFOFK/aCpMRrSXwO', 
        1);

insert into users (user_id, password, default_password, user_type) 
values ('dtran18', 
        '$2y$10$hNOBpxmEeWYTrSTwaTaZlu311hpSgapNg4p.HBZwmxG3IOLueTgOe', 
        '$2y$10$hNOBpxmEeWYTrSTwaTaZlu311hpSgapNg4p.HBZwmxG3IOLueTgOe', 
        1);

insert into users (user_id, password, default_password, user_type) 
values ('ychong', 
        '$2y$10$qtweyeLf5RYVDjD81Mla2eY52D/nvsUX1Bt5sHic5Y8VvJiBNsVUi', 
        '$2y$10$qtweyeLf5RYVDjD81Mla2eY52D/nvsUX1Bt5sHic5Y8VvJiBNsVUi',
        1);

insert into users (user_id, password, default_password, user_type) 
values ('gqian', 
        '$2y$10$uw0jpWIGNNRY1moJme6iQu.6IDp7GFu1S1OPuHHNdjPcTnYS48Bu.', 
        '$2y$10$uw0jpWIGNNRY1moJme6iQu.6IDp7GFu1S1OPuHHNdjPcTnYS48Bu.', 
        2);

insert into users (user_id, password, default_password, user_type) 
values ('elonmusk', 
        '$2y$10$JcRFGGrwDfQB3gM40WWDlOjo1Ukn/qlkP0ds77X69MP.MxzUxQlSi', 
        '$2y$10$JcRFGGrwDfQB3gM40WWDlOjo1Ukn/qlkP0ds77X69MP.MxzUxQlSi', 
        3);

commit;