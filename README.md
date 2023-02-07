# Pokedex Backend API

A RESTful API, built with Laravel, that provides the data for the Pokedex web application. This API serves as the backend for the Angular Pokedex front-end application, providing dynamic and real-time access to Pokemon data. This API uses the data from [PokeAPI](https://github.com/PokeAPI/pokeapi) to provide the core Pokemon data and extends its functionality.


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

## Endpoints

### GET /pokemon

#### Parameters

| Parameter  | Type   | Required | Description                                             |
| ---------- | ------ | -------- | ------------------------------------------------------- |
| name       | string | optional | A string to search for in the Pokemon names.           |
| langId     | int    | optional | The ID of the language to use for the name filter.     |
| typeIds    | array  | optional | An array of type IDs to filter the Pokemon by.         |
| perPage    | int    | optional | The number of Pokemon to return per page.              |
| page       | int    | optional | The number of the current page.                        |

---

### GET /pokemon/{identifier}

#### Parameters

| Parameter   | Type   | Required | Description                                        |
| ----------- | ------ | -------- | -------------------------------------------------- |
| identifier  | string | required | The identifier of the Pokemon to show.            |

---

### GET /move

---

### GET /move/{id}

#### Parameters

| Parameter | Type   | Required | Description                 |
| --------- | ------ | -------- | --------------------------- |
| id        | int    | required | The ID of the move to show. |

---

### GET /evolution/{id}

#### Parameters

| Parameter | Type   | Required | Description                                        |
| --------- | ------ | -------- | -------------------------------------------------- |
| id        | int    | required | The ID of the evolution chain to show.            |


## Contributing
We welcome contributions to this project, whether it's fixing bugs, improving existing features, or adding new ones. If you're interested in contributing, please open a pull request and we'll be happy to review and merge your changes.

## License
This project is open-source and licensed under the [MIT License](https://opensource.org/licenses/MIT).
