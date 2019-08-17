# Laravel PHP Framework

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)

Bulk Mailer is a web application biult on laravel 5.3 to sent bulk email to the set of recipients selected . It is been tested using mailtrap.io . It attepmts to provide a fulfilling service to the customers using it 

## Features in the application  

1 . Adding user to the contact list

2 . Modifying and deleting users in the contact list

3 . Enabling HTML contents to be sent using WYSWYG editor

4 . Sending Bulk mail to require set of recipients in the contact list
 
## Steps to run the project  

1 . Clone the project into localhost

2 . Setup the .env with neccessory details (Database conf and email conf is must) 

3 . Run the following command to create required schema in the database :- 
		
		php artisan migrate

4 . Set the configuration for the mail server on the .env file with the following details

		MAIL_DRIVER=smtp
		MAIL_HOST=smtp.mailtrap.io
		MAIL_PORT=2525
		MAIL_USERNAME=<mailtrap-user-name>
		MAIL_PASSWORD=<mailtrap-password>
		MAIL_ENCRYPTION=tls

For sengrid configuration :-

		MAIL_DRIVER=smtp
		MAIL_HOST=smtp.sendgrid.net
		MAIL_PORT=587
		MAIL_USERNAME=<sendgridUsername>
		MAIL_PASSWORD=<sendgridPassword>

you can checkout for other mail servers too

5 . Run the following command in a separate terminal or create a process run the following binary with options

		php artisan queue:work

6 . Run the laravel framework with artisan server using the following commands

		php artisan serve --port=<port-number>

7 . Use chrome browser preferentially and hit the following URL on the screen and 
	you should be able see the application running in that machine at port <port-number>  

## Contribution

	Deepak (deepakpalakkal2795@gmail.com)
