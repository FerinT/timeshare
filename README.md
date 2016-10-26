# Timeshare

How to run this..

1. Import the script to populate the database in phpmyadmin \timeshare\php\dataaccess\scripts\timeshare.sql
2. Run the page /timeshare/pages ( This takes you to the homepage)

## More Info: <br />
 Whenever you make any make changes make sure you do an end to end run through of the whole app. <br/>
 <br />
  
## What still needs to be done..<br />
1. Verification emails to be sent when registering<br />
2. Authenticating that a user is verified before allowing them to log in<br />
3. Ensuring that a user is logged in before the "confirming purchase" <br />
4. Insert in the Transaction and TransactionLine tables when a user buys something <br />
5. Create a "my profile" page for the user to see what they've sold/selling 
6. Do a sticky form on create advert

## Email Help

 1. Clone swiftmailer at https://github.com/swiftmailer/swiftmailer.git and replace the empty swiftmailer file in our project
    with the cloned repo.
   
 2. Also in Xamp or Wamp find the php.ini file and edit ;extension=php_openssl.dll to extension=php_openssl.dll
    or add extension=php_openssl.dll if id doesnt exsist.
	

<br />
