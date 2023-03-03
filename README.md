# Selected_Topics_in_DB
University management system project
Technologies used are DBMS, GCP CLOUD, HTML, CSS, PHP.
Aim of the project is to create a portal for university which is single place for all the users( Employees, Students, Vendors etc.,) to access all the details(requests, queries, payments, schedules, etc., ).
Technologies and languages used:

Database : Mysql
Server side language : PHP
Web based languages : Html, css.
Server : Xampp.
Web Browser : Chrome(recommended)

IDE or Tools : Mysql Workbench, phpmyadmin, vs code.
Pre requirements: Download and install mysql, workbench, xampp.

Steps to run the project:

1. Install Xampp server in local system. Once installed use 
Download link for Xampp:
https://www.apachefriends.org/download.html

2. After installing, xampp, in xampp control panel, start Apache and mysql and we are ready.

3. Create database and create different tables like students, signedupusers in mysql_workbench and run the xampp with same port, so the tables get synced and be seen in
(phpmyadmin) . Use db table queries that we have in db file (UMS_schema.sql) to create tables and insert data.
Link to access phpmyadmin  :  http://localhost/phpmyadmin/

4. In xampp path, there is working folder htdocs. Create a folder within htdocs and have all the html and php files present here in git inside the folder.
Example path: 

C:\xampp\htdocs\UMS\

Here, UMS is the folder inside htdocs.

5. Next run html pages : firstly, signup_page and enter details of any user present in students table that we create to have successful login. To check other unsuccesful attempts to signup, use random data and verify.
After signup run loginpage.html, enter details of already signedup user for successful login with correct password.

For code understanding:

signup_page.html is sourced to signup_with_validation.php which inturn connect to UMS db (refer code of these files).
loginpage.html is sourced to login_validation.php which inturn connect to UMS db (refer code of these files).

The success.php is redirected to by above html pages on succesful singup or login's.
