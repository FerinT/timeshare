# timeshare

How to run this bad boy for the first deliverable..

1. import the script to populate the database in phpmyadmin \timeshare\php\dataaccess\scripts\timeshare.sql
2. run the page /timeshare ( This takes you to the homepage)
3. run \timeshare\DisplayAdverts.php in order to view advert

More Info:
The register page still needs to be linked to the homepage, all the functionality is there.
The CreateAdvert.php needs to CSS.

The idea:
So far we have figured out how to compare two schedules to see what the user is wanting to purchase, the next step is to create an algorithm to work out the Day and time in order to fill out \timeshare\php\src\cart\Item.php and \timeshare\php\src\cart\Cart.php respectively (DTO) to be passed with sessions.

What still needs to be done..<br />
1. verification emails to be sent when registering<br />
2. authenticating that a user is verified before allowing them to log in<br />
3. ensuring that a user is logged in before the "add to cart" <br />
4. when adding an advert we need to get the current users information in order to save it in the database <br />
5. create funtionality in \timeshare\php\src\schedule\ProcessSchedule.php to add, and remove items from the cart (Session variable) <br />
6. update the adverts associated schedule when a user chooses to buy "time" <br />
<br />

algorithm will be..<br />
time = index / 7 rounded off to the nearest whole number. <br />
x = time * 7 <br />
day = index - x

<br />
PLENTY MORE
