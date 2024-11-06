CI3247 SOFTWARE ENGINEERING COURSEWORK ASSIGNMENT "E-LIBRARY"

MODULE COORDINATOR:-
DR. HJH NOR ZAINAH SIAU 

Submitted by:- 
HAFIZUDDIN BIN ABD WAHAB(B20210019) 
SHAHRIL RADZIMAN BIN SILAU(B20210020) 
AZAMUDDIN BIN ARJUNI(B20210058) 
NUR ASHRAFA BINTI MUHAMMAD EHSAN(B20210028) 
SHARIFAH NURINA BINTI WAN SEPUAN(B20210293)

BACHELOR OF SCIENCE (HONS) IN COMPUTING (MAJOR IN SOFTWARE DEVELOPMENT) SEMESTER 5 / YEAR 2023

GUIDELINES:

1. Install XAMPP (if it's not already installed).
2. Launch the XAMPP Control Panel
3. Access the MySQL Admin or http://localhost/phpmyadmin/index.php.
4. Create the "booksforlibrary_db" database
5. Import the "booksforlibrary_db.sql" file from the folder
6. Create a User Account in phpMyAdmin based on the information in "connection.php" as follows:

	$host = "localhost";
	$dbname = "booksforlibrary_db";
	$username = "admin";
	$password = '1234';

	#Purpose: To establish a connection between the website and the database.

7. Place the "elibrary_portal" folder (containing all webpages) into "C:\xampp\htdocs"
8. You're all set. The E-Library website is now ready to be used.