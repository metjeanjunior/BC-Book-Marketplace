# User registering as customer
# Pre: Username hasn't been used yet
# Post: User now able to sell and buy

insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (1, 'Lillian', 'Porter', 'lporter0', 'x9N78mr6oMsG', 'lporter0@com.com', '6/24/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (2, 'Judy', 'Nelson', 'jnelson1', 'f4yh0Jf', 'jnelson1@vimeo.com', '5/9/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (3, 'Kevin', 'Torres', 'ktorres2', 'A0nIQLs7', 'ktorres2@mit.edu', '1/15/2016');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (4, 'Bonnie', 'Gonzales', 'bgonzales3', 'zgAmy0Gju', 'bgonzales3@spotify.com', '7/15/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (5, 'Jack', 'Lawson', 'jlawson4', 'ZBOtO6M', 'jlawson4@chicagotribune.com', '5/20/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (6, 'Ralph', 'Peters', 'rpeters5', '0qReQZ', 'rpeters5@mapy.cz', '8/27/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (7, 'Joe', 'Knight', 'jknight6', '0b5C7KS46', 'jknight6@over-blog.com', '6/3/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (8, 'Tina', 'Young', 'tyoung7', '9kSpDumOOYi', 'tyoung7@hc360.com', '7/21/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (9, 'Joshua', 'King', 'jking8', '9snRBi2N', 'jking8@behance.net', '10/30/2015');
insert into customer 
	(customer_id, customer_firstname, customer_lastname, customer_username, 
		customer_password, customer_email, customer_date_joined) 
		values (10, 'Michael', 'Sims', 'msims9', 'nv4EZqKKK', 'msims9@google.com.au', '8/19/2015');

# Admin adding another admin
# Pre: Another admin must be loggined 
# Post: New admin now has admin privileges

insert into admin 
	(admin_id, admin_firstname, admin_lastname, admin_username, admin_password, admin_email, admin_date_joined) 
	values (1, 'Michael', 'Day', 'mday0', 'c71dqzK7YjU', 'mday0@scribd.com', '9/9/2015');
insert into admin 
	(admin_id, admin_firstname, admin_lastname, admin_username, admin_password, admin_email, admin_date_joined) 
	values (2, 'Stephanie', 'Diaz', 'sdiaz1', 'TzshNPo4W', 'sdiaz1@nih.gov', '8/22/2015');
insert into admin 
	(admin_id, admin_firstname, admin_lastname, admin_username, admin_password, admin_email, admin_date_joined) 
	values (3, 'Wanda', 'Harper', 'wharper2', '4HhMdP', 'wharper2@hugedomains.com', '5/17/2015');
insert into admin 
	(admin_id, admin_firstname, admin_lastname, admin_username, admin_password, admin_email, admin_date_joined) 
	values (4, 'Thomas', 'Medina', 'tmedina3', 'yXmL8TVw', 'tmedina3@archive.org', '4/2/2016');
insert into admin 
	(admin_id, admin_firstname, admin_lastname, admin_username, admin_password, admin_email, admin_date_joined) 
	values (5, 'Antonio', 'Warren', 'awarren4', 'LXqZqJ', 'awarren4@fc2.com', '3/17/2016');

# Admin adding new professor
# Pre: Admin must be logged in
# Post: professor now in db 
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (1, 'Paula', 'Woods', 9, '4/14/2016');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (2, 'Jesse', 'Martinez', 7, '7/20/2015');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (3, 'Anthony', 'Green', 10, '3/28/2016');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (4, 'Eric', 'Graham', 12, '9/4/2015');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (5, 'Brenda', 'Ramos', 9, '10/30/2015');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (6, 'Maria', 'Jackson', 4, '10/15/2015');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (7, 'Gloria', 'Bowman', 6, '6/7/2015');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (8, 'Howard', 'Morris', 9, '3/26/2016');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (9, 'Brian', 'Gordon', 10, '5/10/2015');
insert into professor 
	(professor_id, professor_firstname, professor_lastname, department_id, professor_date_added) 
	values (10, 'Robert', 'Nichols', 5, '8/16/2015');

# Admin adding department
# Pre: Admin logged in
# Post: new dept in db

insert into department (department_id, department_name) values (1, 'Computer Science');
insert into department (department_id, department_name) values (2, 'Mathematics');
insert into department (department_id, department_name) values (3, 'Chemistry');
insert into department (department_id, department_name) values (4, 'Physics');
insert into department (department_id, department_name) values (5, 'Biology');

# Admin adding class
# Pre: Admin logged in
# Post: class not available in db

insert into class (class_id, class_name, class_description, class_date_added) values (1, 'CS II'); 
insert into class (class_id, class_name, class_description, class_date_added) values (2, 'Calc I'); 
insert into class (class_id, class_name, class_description, class_date_added) values (3, 'Organic Chemistry'); 
insert into class (class_id, class_name, class_description, class_date_added) values (4, 'Intro to Atomic Physics'); 
insert into class (class_id, class_name, class_description, class_date_added) values (5, 'Molecular Theory'); 

# Admin adding book categories

# Admin adding books
# Pre: Admin must be logged in
# Post: book now availabe for all to see in db

insert into book (book_id, book_name, category_id, book_description, book_date_added) 
	values (1, 'Study of Algorithms', 1, 'A dummy introduction to Algorithms using Java', '4/14/2016');
insert into book (book_id, book_name, category_id, book_description, book_date_added) 
	values (2, 'Derivites & Integrals', 2, 'A friendly introduction to calculus', '7/20/2015');
insert into book (book_id, book_name, category_id, book_description, book_date_added) 
	values (3, 'Organic Chemistry', 3, 'NY times best seller. Garenteed to weed out the bad premed students', '3/28/2016');
insert into book (book_id, book_name, category_id, book_description, book_date_added) 
	values (4, 'Atomic Physics thru a Mathematician\'s Eyes', 4, '', '9/4/2015');
insert into book (book_id, book_name, category_id, book_description, book_date_added) 
	values (5, 'Molecular Biology', 5, '', '0/30/2015');

# Admin removing book
# Pre: Admin logged in, book must exist
# Post: book no longer availabe in db

delete from book where book_id = 1; 
delete from book where book_id = 2; 
delete from book where book_id = 3; 
delete from book where book_id = 4; 
delete from book where book_id = 5; 

# Admin removing customer
# Pre: admin logged in, customer must exist
# Post: customer no longer able to login in aka account does not exist
delete from customer where customer_id = 1; 
delete from customer where customer_id = 2; 
delete from customer where customer_id = 3; 
delete from customer where customer_id = 4; 
delete from customer where customer_id = 5; 
delete from customer where customer_id = 6; 
delete from customer where customer_id = 7; 
delete from customer where customer_id = 8; 
delete from customer where customer_id = 9; 
delete from customer where customer_id = 10; 

# Lender/Sender creating a transaction
# Pre: customer must be logged in, book must be in db
# Post: transaction now up for all to see and can choose to become reciever/buyer (also in db)

insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (1, 1, 1, null, now(), 'rent');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (2, 2, 2, null, now(), 'rent');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (3, 3, 3, null, now(), 'rent');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (4, 4, 4, null, now(), 'sell');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (5, 5, 5, null, now(), 'sell');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (6, 1, 6, null, now(), 'sell');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (7, 2, 7, null, now(), 'swap');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (8, 3, 8, null, now(), 'swap');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (9, 4, 9, null, now(), 'swap');
insert into transaction (transaction_id, classBook_id, sender_id, reciever_id, transaction_date, transaction_type) 
	values (10, 5, 10, null, now(), 'swap');
