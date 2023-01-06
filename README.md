<p align="center"><a href="https://www.guildmortgage.com/" target="_blank"><img src="https://www.guildmortgage.com/wp-content/uploads/2016/11/Guild_Logo_RGB_Full.png" width="25%"></a></p>

# Developer test for Guild / Laravel

## Given

- You have a loan application
  - The loan application has 2 borrowers
    - One borrower has a job
    - The other borrower has a job and a bank account

## Requirements

- Fork this git repository and create a feature branch for your changes
- Install a fresh copy of Laravel
- Create some simple database tables to represent the above scenario
  - By simple I mean just the basics of what's really needed for this exercise
  - For example, the borrower should have a name, but we don't need date of birth, social security number or contact information for this exercise
  - Though I would like to see the standard date fields as part of the design (ie. created, updated, deleted)
- Write a query (or queries) that shows the total annual income and bank account values for the application
- Expose an API end point to show the results of the query (or queries)
  - All output should be in JSON format
- Write a unit test on at least one method in the project
  - I'm deliberatly keeping this requirement vague to give you freedom to decide what to test and how
- Update this README file with any installation instructions needed so we can clone and run your code
- Create a Github Pull Request against this repo with your changes

## What we're looking for

- Your general skill-set with PHP and MySQL
- Your general architecture skills
- How well you know your way around Laravel
- Your ability to write unit tests
- Coding style
- How well you adhere to the PSR standards
- Usage of design patterns in your code

## Installation instructions

This installation was done using composer, so it will be starting with composer installed.  

First clone the repository, then in the site folder:

1. Open the command window and navigate to the cloned site
2. Run the Composer Install command

composer install

From here there is a setup.bat file that will continue the installation, or follow the steps below:
1. Copy .env.example to .env
copy .env.example .env

2. generate app_key
php artisan key:generate

## STOP HERE TO EDIT THE .env FILE
3. Open the .env file and edit settings if necessary
4. Edit the DB_HOST and DB_PORT settings on lines 12 and 13, and username and password on lines 15 and 16 if necessary
5. Assign a new database name to DB_DATABASE on line 14 if necessary
6. Continue batch

7. Create the database
php artisan make:database

8. Run migrations and seed the tables
php artisan migrate:refresh --seed

9. Run tests
php artisan test

## From here you should be able to navigate to the website (eg;  localhost/public)