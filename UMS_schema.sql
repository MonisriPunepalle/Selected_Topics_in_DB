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
    (11, 'B',  'B.johnson@example.com', '555-9012');
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



