CREATE DATABASE IF NOT EXISTS php_dev_development;

CREATE TABLE workers (
    id int PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    phone varchar(255)
);