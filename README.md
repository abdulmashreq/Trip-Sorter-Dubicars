# Trip Sorting Assessment
Transportation Boarding Card Sorting.

## Steps
	1. cd PROJECT_FOLDER 
	2. Run composer install
	3. php -S localhost:2000
	4. You will see the results on 
		1. http://localhost:2000?json=true  - it will list as json
	5. http://localhost:2000 - it will show as ordered list of description
	6. You can also use apache server which has already installed in the system. no need to run - php -s

## Requirement 
	- PHP 7 
	- PHPUnit 7 

## Solutions
Folder Structure

    PROJECT_FOLDER
	- src
		- Boards
			- Airport.php
			- Boards.php
			- Bus.php
			- Flight.php
			- Train.php
		- Execeptions
			- TripAPIException.php
		- Intefaces
			- BoardInterface.php
		- TripAPI.php
	- tests
		- TripApiTest.php
		- test.json
	- composer.json
	- index.php
	- input.json
	- README.md
      

## Methods
	1. Handling Exceptions
	2. Interface Pattern
	3. Namespace

## Json Data 
-----------

	- input.json
		[
			{
				"from": "Stockholm",
				"to": "New York",
				"modeOfTransport": "Flight",
				"transportNo": "SK22",
				"gateNo": "22",
				"seatNo": "7B"
			}, {
				"from": "Gerona Airport",
				"to": "Stockholm",
				"modeOfTransport": "Flight",
				"transportNo": "SK455",
				"baggage": "334",
				"gateNo": "45B",
				"seatNo": "3A"
			}, {
				"from": "Madrid",
				"to": "Barcelona",
				"modeOfTransport": "Train",
				"transportNo": "78A",
				"seatNo": "45B"
			}, {
				"from": "Barcelona",
				"to": "Gerona Airport",
				"modeOfTransport": "Bus"
			}
		];

#Results:
--------

1) Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2) Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3) From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.
4) From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.
5) You have arrived at your final destination.


#PHPUNIT
---------

PHPUNIT has written for this App. please install phpunit to run the test.

If you dont have PHPUNIT on your machine, please find the link to install PHPUNIT

https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx

To Run the test:

Just download the latest version and replace the old one. It is provided from the phpunit homepage.

	$ wget https://phar.phpunit.de/phpunit.phar

	$ chmod +x phpunit.phar

	$ sudo mv phpunit.phar /usr/local/bin/phpunit

You are in the latest version. To check version you can use

	$ phpunit --check-version

1. Make sure PHPUNIT has installed or updated latest version. 
2. cd PROJECT_FOLDER/tests
3. Run phpunit TripApiTest.php




