# Software Engineer - Coding challenge by Next Media

An application using Laravel and Vue.js 3 for Next media Software Engineers

# Overview

-   List your products
-   Create products
-   Delete products
-   Find product

# Environment vars

This project uses the following environment variables:

| Name         | Description                                                                             |
| ------------ | --------------------------------------------------------------------------------------- |
| DATABASE_URL | URLs as an alternative to configuring your database with multiple configuration options |

# Pre-requisites

-   PHP >= 7.3
-   [Node](https://nodejs.org/en/)
-   [Composer](https://getcomposer.org/)
-   A supported database: MySQL

# Product definition

| field         | Type     | Description   |
| :------------ | :------- | :------------ |
| `name `       | `string` | **Required**. |
| `description` | `string` | **Required**. |
| `price`       | `float`  | **Required**. |
| `image`       | `string` | **Required**. |

## Category definition

| field             | Type            | Description   |
| :---------------- | :-------------- | :------------ |
| `name `           | `string`        | **Required**. |
| `parent_category` | `null/category` | **Optional**. |

## Run Locally

Clone the project

```bash
  git clone https://link-to-project
```

Go to the project directory

```bash
  cd my-project
```

### Installation

Use the package manager [composer](https://getcomposer.org/) to install required files

Install dependencies

```bash
  composer install
```

Set the environment variables:

```bash
cp .env.example .env
```

1. create a database for the project
2. edit your `.env` file
3. from the project root run `php artisan migrate`
4. run the laravel server using `php artisan serve`

# Build the Front End Assets with Mix

1. From the projects root folder run `npm install`
2. From the projects root folder run `npm run dev` or `npm run production`
3. for the vuejs app run `yarn dev`

# Features

## CLI Reference:

### Creating a Product from cli

```bash
  php artisan create:product
```

# API Endpoints

#### _Get products_

```
[GET] /api/v1/products
```

#### _Create product_

```
[POST] /api/v1/products
```

##### Required Inputs :

-   Name
-   Description
-   Price
-   Image
-   category

# Testing

#### Product creation can be covered by automated tests

```bash
  php artisan test
```

## Authors

-   [@Salma kalkhi](https://www.linkedin.com/in/salma-kalkhi/)
