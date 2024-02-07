
# Simple CMS

![Project Logo](https://media.licdn.com/dms/image/D4D03AQGpc1T-Yx5qIw/profile-displayphoto-shrink_200_200/0/1677084501644?e=2147483647&v=beta&t=66V6hA4TaW5HkGP_zdjpLWLYgWJNT4en_51ULzMmFv4)

This project is a web application for managing pages with nested structures. It allows users to create, delete, and view pages. It's suitable for developers who need a simple and efficient solution for managing hierarchical content such as website pages, articles, or documentation.
## Installation

Clone the repository:

```bash
  git clone https://github.com/dhanushkam88/my-cms/tree/dev
```
    
## Navigate to the project directory:
```bash
  cd project-directory
```
## Install dependencies:
```bash
  composer install
```
## Copy the .env.example file and rename it to .env:

```bash
  cp .env.example .env
```
## Generate an application key:

```bash
  php artisan key:generate
```
## Update the .env file with your database credentials.
## Run migrations:
```bash
  php artisan migrate
```
## Tests

```bash
  php artisan test
```
## License

```bash
  My CMS is open-sourced software licensed under the MIT license.
```