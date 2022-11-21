create table adresses
(
    id           int auto_increment
        primary key,
    City         varchar(50) not null,
    ZipCode      varchar(50) not null,
    Street       varchar(50) not null,
    StreetNumber int         not null
);

INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (1, 'Dolné Plachtince', '99124', 'Stredné Plachtince', 13);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (2, 'BA', '12345', 'ulica', 10);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (3, 'BA', '12345', 'ulica', 10);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (4, 'BA', '12345', 'ulica', 10);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (5, 'BA', '12345', 'ulica', 10);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (6, 'BA', '12345', 'ulica', 10);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (7, 'ZA', '12345', 'testUlice', 69);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (8, 'Zvolen', '96001', 'Trňanská', 6);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (9, 'Bratislava - časť Ružinov', '821 04', 'Mokráň záhon', 4);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (10, 'Lučenec', '12345', 'Rúbanisko', 69);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (11, 'Lučenec', '12345', 'Rúbanisko', 69);
INSERT INTO package_tracker.adresses (id, City, ZipCode, Street, StreetNumber) VALUES (12, 'BA', '123456', 'Rúbanisko', 69);
