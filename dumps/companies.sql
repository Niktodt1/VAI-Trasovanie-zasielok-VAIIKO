create table companies
(
    id                 int auto_increment
        primary key,
    CompanyCode        varchar(50) not null,
    CompanyName        varchar(50) not null,
    CompanyDescription text        null,
    Phone              varchar(50) not null,
    Email              varchar(50) not null,
    AdressId           int         null,
    IconPath           text        null
);

INSERT INTO package_tracker.companies (id, CompanyCode, CompanyName, CompanyDescription, Phone, Email, AdressId, IconPath) VALUES (1, 'Alza', 'Alza.sk', null, '421 123 457 891', 'www.alza.sk/kontakt', null, 'public/images/alza_crop.png');
INSERT INTO package_tracker.companies (id, CompanyCode, CompanyName, CompanyDescription, Phone, Email, AdressId, IconPath) VALUES (2, 'Mall', 'Mall.sk', null, '421 123 456 789', 'www.mall.sk/kontakty', null, 'public/images/mall-sk.png');
INSERT INTO package_tracker.companies (id, CompanyCode, CompanyName, CompanyDescription, Phone, Email, AdressId, IconPath) VALUES (3, 'Datart', 'Datart', null, '421 123 456 789', 'www.datart.sk/napoveda/kontakt ', null, 'public/images/datart-crop.jpg');
