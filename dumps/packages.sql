create table packages
(
    id                int auto_increment
        primary key,
    ReceiverUserId    int        not null,
    CompanyId         int        not null,
    DateOfOrder       datetime   not null,
    DeliveryCompanyId int        not null,
    Received          tinyint(1) null,
    CourierId         int        null,
    TypeOfDelivery    int        null
);

INSERT INTO package_tracker.packages (id, ReceiverUserId, CompanyId, DateOfOrder, DeliveryCompanyId, Received, CourierId, TypeOfDelivery) VALUES (1, 1, 1, '2022-10-13 21:10:36', 1, 0, 1, 1);
INSERT INTO package_tracker.packages (id, ReceiverUserId, CompanyId, DateOfOrder, DeliveryCompanyId, Received, CourierId, TypeOfDelivery) VALUES (2, 1, 2, '2022-10-14 21:10:52', 1, 0, 1, 1);
INSERT INTO package_tracker.packages (id, ReceiverUserId, CompanyId, DateOfOrder, DeliveryCompanyId, Received, CourierId, TypeOfDelivery) VALUES (3, 1, 3, '2022-10-11 21:11:04', 2, 0, 1, 3);
INSERT INTO package_tracker.packages (id, ReceiverUserId, CompanyId, DateOfOrder, DeliveryCompanyId, Received, CourierId, TypeOfDelivery) VALUES (5, 4, 1, '2022-11-16 10:00:00', 1, 0, 1, 2);
INSERT INTO package_tracker.packages (id, ReceiverUserId, CompanyId, DateOfOrder, DeliveryCompanyId, Received, CourierId, TypeOfDelivery) VALUES (6, 5, 3, '2022-11-18 14:25:00', 1, 0, 1, 4);
INSERT INTO package_tracker.packages (id, ReceiverUserId, CompanyId, DateOfOrder, DeliveryCompanyId, Received, CourierId, TypeOfDelivery) VALUES (7, 6, 1, '2022-11-09 09:00:00', 4, 0, 1, 3);
