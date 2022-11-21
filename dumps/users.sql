create table users
(
    id           int auto_increment
        primary key,
    Username     varchar(50) null,
    Password     text        null,
    Name         varchar(50) not null,
    Surname      varchar(50) not null,
    AdressId     int         not null,
    isRegistered tinyint(1)  not null,
    email        varchar(50) not null,
    phone        varchar(50) not null
);

INSERT INTO package_tracker.users (id, Username, Password, Name, Surname, AdressId, isRegistered, email, phone) VALUES (1, 'Niktodt1', 'Vianoce2013', 'Dušan', 'Terek', 1, 1, 'terek.ml@gmail.com', '421918928827');
INSERT INTO package_tracker.users (id, Username, Password, Name, Surname, AdressId, isRegistered, email, phone) VALUES (2, null, null, 'Ján', 'Novák', 4, 0, 'abcd@gmail.com', '123456789');
INSERT INTO package_tracker.users (id, Username, Password, Name, Surname, AdressId, isRegistered, email, phone) VALUES (3, null, null, 'Ján', 'Novák', 5, 0, 'abcd@gmail.com', '123456789');
INSERT INTO package_tracker.users (id, Username, Password, Name, Surname, AdressId, isRegistered, email, phone) VALUES (4, null, null, 'Ján', 'Novák', 6, 0, 'abcd@gmail.com', '123456789');
INSERT INTO package_tracker.users (id, Username, Password, Name, Surname, AdressId, isRegistered, email, phone) VALUES (5, null, null, 'TestName', 'TestSurname', 7, 0, 'test@gmail.com', '123456789');
INSERT INTO package_tracker.users (id, Username, Password, Name, Surname, AdressId, isRegistered, email, phone) VALUES (6, null, null, 'Ján', 'Novák', 11, 0, 'jan.novak@gmail.com', '123456789');
