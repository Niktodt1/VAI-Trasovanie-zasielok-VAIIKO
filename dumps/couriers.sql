create table couriers
(
    id                int auto_increment
        primary key,
    Name              varchar(50) not null,
    Surname           varchar(50) not null,
    DeliveryCompanyId int         not null,
    Phone             varchar(50) null,
    Email             varchar(50) null,
    PicturePath       text        null
);

INSERT INTO package_tracker.couriers (id, Name, Surname, DeliveryCompanyId, Phone, Email, PicturePath) VALUES (1, 'Marek', 'Kuriér', 1, '421 123 457 891', null, 'public/images/kurier.jpg');
