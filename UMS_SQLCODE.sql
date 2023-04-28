create database UMS;

use UMS;
CREATE TABLE signedup_users (
    username varchar(255),
    sname varchar(255),
    spassword varchar(255),
    semail varchar(255),
    phone VARCHAR(20) NOT NULL,
	role ENUM('user', 'admin') NOT NULL DEFAULT 'user'
);
CREATE TABLE login_logs (

login_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
email VARCHAR(255) NOT NULL,
ip_address VARCHAR(45) NOT NULL
);

CREATE TABLE students (
    id INT NOT NULL PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL
    
);


INSERT INTO students (id, name, email, phone)
VALUES
  
    (9, 'Monisri',  'monisripunepalli@gmail.com', '6298991888'),
    (10, 'A',  'A.johnson@example.com', '555-9012'),
    (11, 'B',  'B.johnson@example.com', '555-9012'),
	(20, 'Antman', 'antman@gmail.com', '2536482934'),
    (21, 'BlackWidow', 'blackwidow@example.com', '553435452'),
    (22, 'hulk', 'hulk@gmail.com', '343545434'),
    (23, 'blackpanther', 'blackpanther@gmail.com', '38578457'),
    (24, 'captainAmerica', 'captainAmerica@gmail.com', '2536482934'),
    (25, 'nickfury', 'nickfury@gmail.com', '2536482934'),
    (26, 'batman', 'batman@gmail.com', '2536482934'),
    (27, 'ultraman', 'ultraman@gmail.com', '85847542'),
    (28, 'sanju', 'ysanju10@gmail.com', '736473482'),
    (29, 'yash', 'yash.patel@gmail.com', '94934932'),
    (31, 'sanjuyelisala', 'sy3t@mtmail.mtsu.edu', '74675648'),
    (32, 'monisri', 'mp7r@mtmail.mtsu.edu', '8736482934'),
    (33, 'thor', 'thor@gmail.com', '5548574858'),
    (13, 'Yash',  'yash.patel@gmail.com', '6295643218'),
    (14, 'C',  'A.johnson@example.com', '6289977616'),
    (15, 'D',  'B.johnson@example.com', '8976543211');
rename table credentials to signedup_users;
INSERT INTO students (id, name, email, phone)
VALUES
  
    (13, 'Yash',  'yash.patel@gmail.com', '6295643218'),
    (14, 'C',  'A.johnson@example.com', '6289977616'),
    (15, 'D',  'B.johnson@example.com', '8976543211');
drop table signedup_users;

show databases;
show tables;

drop table signedup_users;
drop table login_logs;

show grants for 'anusha'@'localhost';

select * from students;
 

show grants for 'moni'@'localhost';
select user from mysql.db where Db = 'ums';

drop table login_logs;

select * from login_logs ;


show grants for 'monisri'@'localhost'
