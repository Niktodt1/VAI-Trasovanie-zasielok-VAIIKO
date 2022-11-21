create table deliverycodes
(
    id           int auto_increment
        primary key,
    DeliveryText text not null
);

INSERT INTO package_tracker.deliverycodes (id, DeliveryText) VALUES (1, 'Kuriérom');
INSERT INTO package_tracker.deliverycodes (id, DeliveryText) VALUES (2, 'Poštovým kuriérom');
INSERT INTO package_tracker.deliverycodes (id, DeliveryText) VALUES (3, 'Na poštu');
INSERT INTO package_tracker.deliverycodes (id, DeliveryText) VALUES (4, 'Do boxu');
INSERT INTO package_tracker.deliverycodes (id, DeliveryText) VALUES (5, 'Zásielkovňa');
