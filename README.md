University Management System.

University management system project Technologies used are DBMS, GCP CLOUD, HTML, CSS, PHP. Aim of the project is to create a portal for university which is single place for all the users( Employees, Students, Vendors etc.,) 
to access all the details(requests, queries, payments, schedules, etc., ).

Technologies and languages used:

Database : Mysql
Server side language : PHP
Web based languages : Html, css.
Server : Xampp.
Cloud : Google Cloud Platform( CloudSQL, Cloudshell, cloud storage bucket)
Web Browser : Chrome(recommended)

IDE or Tools : Mysql Workbench, phpmyadmin, vs code.
Pre requirements: Download and install mysql, workbench, xampp, Create GCP account, create bucket and one cloudSQL instance)

Steps to run the project:

1. Install Xampp server in local system. Once installed use 
Download link for Xampp:
https://www.apachefriends.org/download.html

2. After installing, xampp, in xampp control panel, start Apache and mysql and we are ready.

3. Create database and create different tables like students, signedupusers in mysql_workbench and run the xampp with same port, so the tables get synced and be seen in
(phpmyadmin) . Use db table queries that we have in db file (UMS_SQLCODE.sql) to create tables and insert data.
Link to access phpmyadmin  :  http://localhost/phpmyadmin/.

4. Once we have data ready, take a dump of database from mysql workbench and upload this dumpfile to bucket in GCP. Then import this file in bucket to database(this database needs to be created once instance is running by us) in CloudSQL.

5. Make connections from cloud sql instance to local machine, by adding your local ipv4 address in authorised network field of your cloud instance.

6. Once connection is ready, we will have php application in onprem ( local machine).

7. So, In xampp path, there is working folder htdocs. Create a folder within htdocs and have all the html,css, php and python files present here in git inside the created folder.
Example path: 

C:\xampp\htdocs\UMS\

Here, UMS is the folder inside htdocs.

5. Next run html pages : firstly, signup_page and enter details of any user present in students table that we create to have successful signup( the detailes will get stored in signedup_users). To check other unsuccesful attempts to signup, use random data and verify.
After signup run loginpage.html, enter details of already signedup user for successful login with correct password, then it asks for OTP, check your email you should see a OTP received, enter the email and you will have successful login after these two steps.
( one is correct password, next is correct OTP). After login successful details are stored in login_logs. To verify the data in tables, use cloud shell option at the top corner in your clous SQL instance page. 
Activate the cloud shell for mysql first using your sql instance nameand password. Then it works same mysql editor and can use sql commands to check and verify the tables.


For code understanding:

signup_page.html is sourced to signup_with_validation.php which inturn connect to UMS db (refer code of these files).
loginpage.html is sourced to login_validation.php which inturn connect to UMS db (refer code of these files).
All OTP filesare used for two factor authentication along with python script file for validating otp.
GoogleAuthenticator.php is used for generating secret keys and OTP's.

The successlogin and signup pages is redirected to by above html pages on succesful signup or login's.

