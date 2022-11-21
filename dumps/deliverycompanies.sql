create table deliverycompanies
(
    id                         int auto_increment
        primary key,
    DeliveryCompanyCode        varchar(50) not null,
    FullCompanyName            text        null,
    DeliveryCompanyDescription text        null,
    AdressId                   int         null,
    Phone                      varchar(50) not null,
    Email                      varchar(50) not null,
    Website                    varchar(50) null,
    IconPath                   text        null
);

INSERT INTO package_tracker.deliverycompanies (id, DeliveryCompanyCode, FullCompanyName, DeliveryCompanyDescription, AdressId, Phone, Email, Website, IconPath) VALUES (1, 'Geis', 'Geis Cargo s.r.o.', 'Sme súčasťou nadnárodnej logistickej skupiny Geis so sídlom v nemeckom Bad Neustadte. Na slovenskom trhu pôsobíme už od roku 2006 a patríme tu medzi popredných poskytovateľov komplexných prepravných a logistických služieb."', 8, '18181', 'info@geis.sk', 'www.geis-group.sk/kontakt', 'public/images/geis.png');
INSERT INTO package_tracker.deliverycompanies (id, DeliveryCompanyCode, FullCompanyName, DeliveryCompanyDescription, AdressId, Phone, Email, Website, IconPath) VALUES (2, 'UPS', 'United Parcel Service Slovakia s.r.o.', 'United Parcel Service je americká kurýrní globální společnost. Zabývá se dodáváním balíků a specializuje se na dodávání různých specializovaných služeb v přepravě i logistice.', 9, '421 123 457 891', ' bratislava@sps-sro.sk', 'www.ups.com/sk/help-center', 'public/images/ups.png');
INSERT INTO package_tracker.deliverycompanies (id, DeliveryCompanyCode, FullCompanyName, DeliveryCompanyDescription, AdressId, Phone, Email, Website, IconPath) VALUES (4, 'Cupcake', 'Cupcake Industries', '>Insert obligatory Arcane quote here<', 10, '123456789', 'abcde@gmail.com', 'www.cupcakeindustries.com', 'public/images/cupcake.webp');
