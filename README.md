# timeshare

How to run this..

1. import the script to populate the database in phpmyadmin \timeshare\php\dataaccess\scripts\timeshare.sql
2. run the page /timeshare ( This takes you to the homepage)

## More Info:
The CreateAdvert.php needs CSS. The user now gets inserted into the verification table and not user table however in RegisterDAO I am unable to add user to user table when they verify. still need to add the line in the login that checks if they're in the verification table <br />

## What still needs to be done..<br />
1. verification emails to be sent when registering<br />
2. authenticating that a user is verified before allowing them to log in<br />
3. ensuring that a user is logged in before the "confirming purchase" <br />
4. insert in the Transaction and TransactionLine tables when a user buys something <br />
5. Create a "my profile" page for the user to see what they've sold/selling 

## Email Help

 1. Clone swiftmailer at https://github.com/swiftmailer/swiftmailer.git and replace the empty swiftmailer file in our project
    with the cloned repo.
   
 2. Also in Xamp or Wamp find the php.ini file and edit ;extension=php_openssl.dll to extension=php_openssl.dll
    or add extension=php_openssl.dll if id doesnt exsist.

<br />
