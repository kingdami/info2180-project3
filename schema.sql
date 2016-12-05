Drop database if exists users;

create database users;
USE users;

Create table user(
    user_id varchar(50) not null,
    firstname varchar(32) not null,
    lastname varchar(32) not null,
    username varchar(32) not null,
    password text not null,
    user_type varchar(50),
    primary key(user_id)
);

Create table message(
    message_id int not null AUTO_INCREMENT,
    recipient_ids varchar(50) not null,
    user_id varchar(50),
    subject text,
    body text,
    date_sent date,
    primary key(message_id),
    foreign key(user_id) references user(user_id)
);

Create table message_read(
    message_read_id int not null AUTO_INCREMENT,
    message_id int,
    reader_id varchar(50),
    date_read date,
    primary key(message_read_id),
    foreign key(message_id) references message(message_id)
);


insert into user(user_id,firstname,lastname,username,password, user_type) values('email@something.com','Damian', 'Whyte', 'kingdami', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8','user');
insert into user(user_id,firstname,lastname,username,password, user_type) values('admin@cheapomail.com','Admin', 'User', 'admin', '70ccd9007338d6d81dd3b6271621b9cf9a97ea00', 'admin');


insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 1', 'This is the first test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 2', 'This is the second test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 3', 'This is the third test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 4', 'This is the fourth test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 5', 'This is the fifth test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 6', 'This is the sixth test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 7', 'This is the seventh test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 8', 'This is the eigth test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 9', 'This is the ninth test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 10', 'This is the 10th test.', '2016-12-3');
insert into message(recipient_ids, user_id, subject, body, date_sent) values ('email@something.com', 'admin@cheapomail.com', 'Test 11', 'This is the eleventh test.', '2016-12-3');
