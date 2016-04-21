-- these tables are hosted on the metelusj database
-- While, this currently serves all our needs, 
-- the tables might be adjusted as the developers see fit

create table customer
(
	customer_id int(3) auto_increment primary key,
	customer_firstname varchar(256) not null,
	customer_lastname varchar(256) not null,
	customer_username varchar(256) not null unique,
	customer_password varchar(256) not null, --sha1 encrypted
	customer_date_joined timestamp not null
);
alter table customer
	add customer_email varchar(256) not null;

create table admin
(
	admin_id int(3) auto_increment primary key,
	admin_firstname varchar(256) not null,
	admin_lastname varchar(256) not null,
	admin_username varchar(256) not null unique,
	admin_password varchar(256) not null,  --sha1 encrypted
	admin_date_joined timestamp not null
);
alter table admin
	add admin_email varchar(256) not null;

create table professor
(
	professor_id int(3) auto_increment primary key,
	professor_firstname varchar(256) not null,
	professor_lastname varchar(256) not null,
	professor_date_added date not null
);

create table course
(
	course_id int(3) auto_increment primary key,
	course_name varchar(256) not null,
	course_description text(1000),
	course_date_added date not null
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

create table requiredBooks --find better name
(
	requiredBooks_id int(3) auto_increment primary key,
	professor_id int,
	book_id int,
	foreign key(book_id) references book(book_id),
	foreign key(professor_id) references professor(professor_id)
);

create table transaction
(
	transaction_id int(3) auto_increment primary key,
	requiredBooks_id int,
	sender_id int,
	reciever_id int,
	foreign key(requiredBooks_id) references requiredBooks(requiredBooks_id),
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
