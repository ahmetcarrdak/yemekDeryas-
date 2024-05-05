create table customer
(
    id      int auto_increment
        primary key,
    isim    varchar(255) not null,
    telefon varchar(15)  not null,
    mail    varchar(255) not null,
    adres   text         not null,
    sifre   varchar(255) not null
);

create table favori
(
    id            int auto_increment
        primary key,
    kullanici_adi varchar(255)   not null,
    urun_id       int            not null,
    urun_adi      varchar(255)   not null,
    urun_fiyati   decimal(10, 2) not null,
    urun_kategori varchar(255)   null
);

create table product
(
    product_id   int auto_increment
        primary key,
    product_name varchar(255)   not null,
    price        decimal(10, 2) not null,
    store_id     int            not null,
    category     varchar(255)   not null,
    image_url    varchar(255)   null,
    mail         varchar(255)   null,
    constraint product_ibfk_1
        foreign key (store_id) references yemekderyası.store (store_id)
);

create index store_id
    on product (store_id);

create table sepet
(
    id            int auto_increment
        primary key,
    kullanici_adi varchar(255)   null,
    urun_id       int            null,
    urun_adi      varchar(255)   null,
    urun_fiyati   decimal(10, 2) null,
    urun_adedi    int            null,
    urun_kategori varchar(250)   null
);

create table store
(
    store_id    int auto_increment
        primary key,
    store_name  varchar(255) not null,
    iban        varchar(30)  not null,
    price_range varchar(50)  null,
    logo_url    varchar(255) null
);

