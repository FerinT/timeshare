# timeshare

How to run this bad boy for the first deliverable..

1. import the script to populate the database in phpmyadmin \timeshare\php\dataaccess\scripts\timeshare.sql
2. run the page /timeshare/DisplayAdverts.php

More Info:

*DisplayAdverts.php calls the page AdvertDetails.php when you click on the link.
*You will notice that there are some duplicate classes with a '1' at the end, this is due to refactoring. 
*The only difference between service1.php (The one currently in use) and service.php is that we added value objects in Service1.php 
*ServiceDAO1.php (The one currently in use) was my attempt at using a join to construct a Service1.php object (with the schedule and    user value objects) this only contains a select all for now
