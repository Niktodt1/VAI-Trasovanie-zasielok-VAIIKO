create table stages
(
    id                int auto_increment
        primary key,
    Datetime          datetime    not null,
    PackageId         int         not null,
    StageCurrentId    int         not null,
    EstTimeOFDelivery varchar(50) null,
    LastSeen          text        null
);

INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (1, '2022-10-15 15:45:01', 1, 4, '17.10. medzi 10:00 - 14:00', 'Neďaleko obce Senohrad');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (2, '2022-10-14 17:10:12', 2, 2, '18.10. medzi 8:00 - 12:00', 'Sídlo Alza.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (3, '2022-10-14 11:47:26', 3, 5, 'Na pošte v obci Veľký Krtíš', 'Sídlo Mall.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (4, '2022-10-13 10:10:00', 1, 1, '17.10. medzi 10:00 - 14:00', 'Sídlo Mall.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (5, '2022-10-13 14:10:00', 1, 2, '17.10. medzi 10:00 - 14:00', 'Pošta Veľký Krtíš, Námestie Škultétyho 1, 990 01 Veľký Krtíš');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (6, '2022-10-14 15:10:10', 1, 3, '17.10. medzi 10:00 - 14:00', 'Sídlo Alza.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (7, '2022-10-14 13:54:00', 2, 1, '18.10. medzi 8:00 - 12:00', 'Sídlo Alza.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (8, '2022-10-11 08:40:10', 3, 1, '16.10. medzi 9:00 - 13:00', 'Datart.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (9, '2022-10-11 14:17:22', 3, 2, '16.10. medzi 9:00 - 13:00', 'Datart.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (10, '2022-10-11 22:40:40', 3, 3, '16.10. medzi 9:00 - 13:00', 'Datart.sk, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (11, '2022-10-12 06:22:54', 3, 4, '16.10. medzi 9:00 - 13:00', 'Prekladisko spoločnosti UPS, Bratislava');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (12, '2022-11-16 10:00:00', 5, 1, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (13, '2022-11-16 10:00:00', 5, 2, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (14, '2022-11-16 10:00:00', 5, 3, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (15, '2022-11-16 10:00:00', 5, 4, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (16, '2022-11-16 10:00:00', 5, 5, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (17, '2022-11-18 14:25:00', 6, 1, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (18, '2022-11-18 14:25:00', 6, 2, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (19, '2022-11-18 14:25:00', 6, 3, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (20, '2022-11-18 14:25:00', 6, 4, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (21, '2022-11-18 14:25:00', 6, 5, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (22, '2022-11-09 09:00:00', 7, 1, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (23, '2022-11-09 09:00:00', 7, 2, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (24, '2022-11-09 09:00:00', 7, 3, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (25, '2022-11-09 09:00:00', 7, 4, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
INSERT INTO package_tracker.stages (id, Datetime, PackageId, StageCurrentId, EstTimeOFDelivery, LastSeen) VALUES (26, '2022-11-09 09:00:00', 7, 5, 'Not implemented yet, sorry...', 'Not implemented yet, sorry...');
