-- these tables are hosted on the metelusj database
-- While, this currently serves all our needs, 
-- the tables might be adjusted as the developers see fit
-- All password fields will be sha1 encrypted

drop table rent;
drop table swap;
drop table transaction;
drop table classBook;
drop table book;
drop table bookCategory;
drop table class;
drop table professor;
drop table department;
drop table admin;
drop table customer;

create table customer
(
	customer_id int(3) auto_increment primary key,
	customer_firstname varchar(256) not null,
	customer_lastname varchar(256) not null,
	customer_username varchar(256) not null unique,
	customer_password varchar(256) not null,
	customer_email varchar(256) not null,
	customer_date_joined timestamp not null
);
-- alter table customer
-- 	add customer_email varchar(256) not null;
-- alter table customer 
-- 	change column customer_date_joined customer_date_joined timestamp after customer_email;


create table admin
(
	admin_id int(3) auto_increment primary key,
	admin_firstname varchar(256) not null,
	admin_lastname varchar(256) not null,
	admin_username varchar(256) not null unique,
	admin_password varchar(256) not null, 
	admin_email varchar(256) not null,
	admin_date_joined timestamp not null
);
-- alter table admin
-- 	add admin_email varchar(256) not null;
-- alter table admin 
-- 	change column admin_date_joined admin_date_joined timestamp after admin_email;

create table department
(
	department_id int(2) auto_increment primary key,
	department_name varchar(256) not null
);

create table professor
(
	professor_id int(3) auto_increment primary key,
	professor_firstname varchar(256) not null,
	professor_lastname varchar(256) not null,
	department_id int(2),
	professor_date_added date not null,
	foreign key(department_id) references department(department_id)
);

create table class
(
	class_id int(3) auto_increment primary key,
	class_name varchar(256) not null,
	class_description text(1000),
	class_date_added date not null
);

create table bookCategory
(
	bookCategory_id int(3) auto_increment primary key,
	bookCategory_name varchar(256) not null
);

create table book
(
	book_id int(3) auto_increment primary key,
	book_name varchar(256) not null,
	category_id int,
	foreign key(category_id) references bookCategory(bookCategory_id),
	book_description text(1000),
	book_date_added date not null
);

create table classBook
(
	classBook_id int(3) auto_increment primary key,
	class_id int,
	professor_id int,
	book_id int,
	foreign key(class_id) references class(class_id),
	foreign key(book_id) references book(book_id),
	foreign key(professor_id) references professor(professor_id)
);

create table transaction
(
	transaction_id int(3) auto_increment primary key,
	classBook_id int,
	sender_id int,
	reciever_id int,
	foreign key(classBook_id) references classBook(classBook_id),
	foreign key(sender_id) references customer(customer_id),
	foreign key(reciever_id) references customer(customer_id),
	transaction_date timestamp,
	transaction_type set('rent', 'sell', 'swap') not null
);


create table rent
(
	rent_id int(3) auto_increment primary key,
	transaction_id int,
	foreign key(transaction_id) references transaction(transaction_id),
	rent_status set('in progress', 'completed'),
	rent_return_date date not null
);

create table swap
(
	swap_id int(3) auto_increment primary key,
	transaction_id int,
	book1_id int,
	book2_id int,
	foreign key(transaction_id) references transaction(transaction_id),
	foreign key(book1_id) references book(book_id),
	foreign key(book2_id) references book(book_id),
	swap_type set('temp', 'permanent') not null,
	swap_status set('in progress', 'completed'),
	swap_return_date date
);
