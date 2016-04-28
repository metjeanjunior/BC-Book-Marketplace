-- these tables are hosted on the metelusj database
-- While, this currently serves all our needs, 
-- the tables might be adjusted as the developers see fit
-- All password fields will be sha1 encrypted

drop table sell;
drop table rent;
drop table swap;
drop table transaction;
drop table book;
drop table admin;
drop table customer;

create table customer
(
	customer_id int(6) auto_increment primary key,
	customer_username varchar(256),
	customer_password varchar(256) not null,
	customer_email varchar(256) not null unique,
	customer_date_joined timestamp default now()
);

create table admin
(
	admin_id int(6) auto_increment primary key,
	admin_username varchar(256),
	admin_password varchar(256) not null, 
	admin_email varchar(256) not null unique,
	admin_date_joined timestamp default now()
);

create table book
(
	book_ibsn int(13) primary key,
	book_name varchar(256) not null,
	book_description text(1000),
	book_condition set('new', 'used- Like new', 'used - minor damage', 'used - damaged') not null,
	book_date_added timestamp  default now()
);

create table transaction
(
	transaction_id int(6) auto_increment primary key,
	sender_id int,
	receiver_id int,
	book_ibsn int,
	transaction_price int(4),
	transaction_type set('rent', 'sell', 'swap') not null,
	transaction_date timestamp default now(), 
	foreign key(sender_id) references customer(customer_id),
	foreign key(receiver_id) references customer(customer_id),
	foreign key(book_ibsn) references book(book_ibsn)
);


create table rent
(
	rent_id int(6) auto_increment primary key,
	transaction_id int,
	foreign key(transaction_id) references transaction(transaction_id),
	rent_status set('in progress', 'completed'),
	rent_return_date timestamp not null
);

create table swap
(
	swap_id int(6) auto_increment primary key,
	transaction_id int,
	book1_id int,
	book2_id int,
	foreign key(transaction_id) references transaction(transaction_id),
	foreign key(book1_id) references book(book_ibsn),
	foreign key(book2_id) references book(book_ibsn),
	swap_status set('in progress', 'completed'),
	swap_type set('temp', 'permanent') not null,
	swap_return_date timestamp
);

create table sell
(
	sell_id int(6) auto_increment primary key,
	transaction_id int,
	sell_date timestamp default now(),
	foreign key(transaction_id) references transaction(transaction_id)
);