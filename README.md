# Pokedex Backend API

A RESTful API built with Laravel, providing data for the Pokedex web application. This API serves as the backend for the front-end Angular Pokedex application, enabling dynamic and real-time access to Pokemon data. This API leverages the data from [PokeAPI](https://github.com/PokeAPI/pokeapi) to provide the core Pokemon data, and extends its functionality.


## Prerequisites
- PHP 8.0 or higher
- Laravel 9.x
- MySQL or any other supported database management system

## Installation
To get started with the API, follow these steps:
1. Clone or download the repository
2. Navigate to the project directory and run `composer install` to install the dependencies
3. Copy the `.env.example` file to `.env` and set your environment variables (e.g. database credentials)
4. Run `php artisan migrate` to set up the database tables
5. Run `php artisan db:seed` to fetch the data for the API 
5. Start the development server with `php artisan serve`

## Contributing
We welcome contributions to this project, whether it's fixing bugs, improving existing features, or adding new ones. If you're interested in contributing, please open a pull request and we'll be happy to review and merge your changes.

## License
This project is open-source and licensed under the [MIT License](https://opensource.org/licenses/MIT).
