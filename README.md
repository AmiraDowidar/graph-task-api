# Graph API task

The task for creating a directed cyclic graph

## System requirements
| Technology | Version |
| ------ | ------      |
| PHP    |7.2.17-0     |
| PHP-extensions   |php-mysql, ...   |
|Ubuntu  |ubuntu0.18.04.1 |
|Zend Engine |v3.2.0  |
|My SQL  |5.7.26      |
|Composer| 1.8.4      |

## Framework used API Platform
https://api-platform.com

API platform is built with Symfony 4 and supports graphql, Swagger, and JSON API
graphql link => http://localhost:8000/api/graphql


### Commands used for builing the app

```sh
composer create-project symfony/skeleton graphtask-api
cd graphtask-api/
composer require api
composer require webonyx/graphql-php
composer require server --dev
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
php bin/console make:entity --api-resource
composer require migrations
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

### Issue found with Framework for self-referenced entity
https://github.com/api-platform/core/issues/244 => I need to create a custom normalizer


### How to run the application on Symfony dev server
http://localhost:8000/api

change database credentials in .env file DATABASE_URL
the run the Commands
```sh
cd graphtask-api/
composer up
```
```sh
php bin/console doctrine:database:create
php bin/console doctrine:schema:create
php bin/console cache:clear
php bin/console server:run
```

### dijkstra with sample test result can be found at http://localhost:8000/

Where test data is fed by a custom SeedService


### TODO list

- create benchmark for different algorithms
- test with corner cases
- run php code sniffer
- Create a mutation for graphql to batch insert the graph with the vertices.
- use redis or MongoDB instead of Mysql.
- check if I can use a database like orientDB which is built specifically for graphs.
- create docker-compose file to start the application
- write unit tests for the API's and algorithms
- work on saving APIsubresources with ids instead of IRIs ( api-platform )

### References

- https://api-platform.com/docs/distribution/
