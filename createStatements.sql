create table customer
(
	id int(3) auto_increment primary key,
	firstname varchar(256) not null,
	lastname varchar(256) not null,
	username varchar(256) not null unique,
	password varchar(256) not null,
	date_joined timestamp() not null
);

create table admin
(
	id int(3) auto_increment primary key,
	firstname varchar(256) not null,
	lastname varchar(256) not null,
	username varchar(256) not null unique,
	password varchar(256) not null,
	date_joined timestamp() not null
);

create table professor
(
	id int(3) auto_increment primary key,
	firstname varchar(256) not null,
	lastname varchar(256) not null,
	date_added date not null
);

create table course
(
	id int(3) auto_increment primary key,
	name varchar(256) not null,
	description text(1000),
	date_added date
);

create table book
(
	id int(3) auto_increment primary key,;
	name varchar(256) not null
	description text(1000),
	category varchar(256),
	date_added date
);

create table class 
(
	class_id int(3) auto_increment primary key,
	foreign key(book) references book(id),
	foreign key(professor) references professor(id)
);

create table trasaction
(
	order_id int(3) auto_increment primary key,
	foreign key(class) references class(class_id),
	foreign key(sender) references customer(id) not null,
	foreign key(reciever) references customer(id),
	oder_date date,
	order_type set('rent', 'sell', 'swap'),
);


create table rent
(
	rent_id int(3) auto_increment primary key,
	foreign key(transaction) references transaction(id),
	return_date date not null,
	status set('in progress', 'completed')
);

create table swap
(
	swap_id int(3) auto_increment primary key,
	foreign key(transaction) references transaction(id),
	foreign key(book1) references book(id),
	foreign key(book2) references book(id),
);