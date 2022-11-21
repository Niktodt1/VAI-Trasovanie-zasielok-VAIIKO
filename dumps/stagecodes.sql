create table stagecodes
(
    id               int auto_increment
        primary key,
    StageDescription text not null
);

INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (1, 'Objednávka je zaregistrovaná');
INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (2, 'Obchodník vybavuje objednávku');
INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (3, 'Zásielka je pripravená na expedíciu');
INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (4, 'Zásielka je už v preprave');
INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (5, 'Zásielka bola doručená na poštu');
INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (6, 'Zásielka bola doručená do boxu');
INSERT INTO package_tracker.stagecodes (id, StageDescription) VALUES (7, 'Zásielka bola doručená do zásielkovne');
