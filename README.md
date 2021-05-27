## Installation Instructions

- This uses a MySQL/MariaDB database.  Make sure there's a server available, create or use an available database and include it in the .env file. [More Information](https://laravel.com/docs/8.x/database)
- Install this laravel instance in whatever flavor you normally choose [More information on installing a Laravel instance](https://laravel.com/docs/8.x/installation)
- run `php artisan migrate:fresh --seed` in this file's directory.
- run `npm install` (used tailwind css for css framework) 
- Confirm installation and operation by hitting the index page.
- Enjoy!

## Test Expectations
**Business Requirements**
The problem to solve is the management of orders into our system. As a HTL admin, I want to be able to:
- Create, update and delete an order
- List orders by keys, vehicles, and technician

Keep in mind there is a relationship between keys and vehicles.

### Technical Requirements
**Backend**
- CRUD for orders using REST API.
- Validate request parameters
- Use a database to store data (or some sort of data model store)

**Frontend**
- Allow to select key in order creation from an existent list related to vehicle information.
- Allow to select technician in order creation from an existent list.
- The technician name should be showed as Last Name, First Name.
- Use HTTP request to access the REST API.
- Front end only needs to be as styled as a Craigslist page (basically just enough to just make it
easy to navigate).

**Data**

Either pre-populate the Keys, Vehicles, Technician tables or hard code JSON objects for Keys, Vehicles,
Technicians to use around the orders CRUD. Data for these do not have to be accurate data, as an
example:
- Key – Name: Item A, Description: This is item A, Price: 1.00
- Vehicle – Year: 2020, Make: Car, Model: A, VIN: 123456789
- Key/Vehicles – KeyId:1, VehicleId:1
- Technician – First Name: Uno, Last Name: Nombre, Truck Number: 1

**Others**

- All source code (including database scripts) must be stored in git repository (you can send it as
github or bitbucket link).
- Candidates are free to use any libraries, however you must incorporate Laravel's framework as part of your solution
- Implement unit tests where necessary
- Follow language specific style guidelines and standards (psr, phplint, jslint, etc.)

**What we expect from you?**

Production ready solution that you are proud of
