create database if not exists coffeeometerdb character set utf8
collate utf8_general_ci;

use coffeometerdb;

create table type (
	id integer auto_increment primary key,
	name varchar(25)
) engine=InnoDB;

create table coffee (
	id integer auto_increment primary key,
	name varchar(25),
	description varchar(125),
	type_id integer,
	constraint foreign key (type_id) references type (id)
) engine=InnoDB;

create table consumption (
	id integer auto_increment primary key,
	date date,
	hour time,
	quantity integer,
	week_day varchar(8),
	price decimal(5,2),
	coffee_id integer,
	constraint foreign key (coffee_id) references coffee (id)
) engine=InnoDB;
