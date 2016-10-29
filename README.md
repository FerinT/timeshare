# Timeshare

How to run this..

1. Import the script to populate the database in phpmyadmin \timeshare\php\dataaccess\scripts\timeshare.sql
2. Run the page /timeshare/pages ( This takes you to the homepage)

## More Info: <br />
 Whenever you make any make changes make sure you do an end to end run through of the whole app. <br/>
# MAJOR ISSUE<br />
 Adverts do not get deleted when there are no more time slots avaliable, this causes a lot of extra infor in our DB, I created a work around for now where adverts without timeslots simply don't get displayed. Reason for the work around and not simply deleting the advert is that /timeshare/pages/profile.php relies on tables associated with an advert to display the history. The best thing would be for the profile history to be generated only from order line and transaction. <br/> <br/>
 <br />
  
## What still needs to be done..<br />
1. The Readme/install guide must be produced. PS easy enough for mom and dad to install.
2. Advert needs to be deleted when all the timeslots are taken

## Email Help
 1. Clone swiftmailer at https://github.com/swiftmailer/swiftmailer.git and replace the empty swiftmailer file in our project
    with the cloned repo.
   
 2. Also in Xamp or Wamp find the php.ini file and edit ;extension=php_openssl.dll to extension=php_openssl.dll
    or add extension=php_openssl.dll if id doesnt exsist.
	

<br />
