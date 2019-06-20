
composer create-project symfony/skeleton graphtask-api

cd graphtask-api/

composer req api

composer require webonyx/graphql-php

composer req server --dev

echo update database env and doctrine.yaml FILES

php bin/console doctrine:database:create

php bin/console doctrine:schema:create

php bin/console make:entity --api-resource

php bin/console doctrine:schema:update --force

composer require migrations

php bin/console make:migration

php bin/console doctrine:migrations:migrate

php bin/console cache:clear

php bin/console server:run

 php bin/console make:controller ShortestPathController --no-template

 composer require --dev symfony/phpunit-bridge

composer require symfony/lock

composer require doctrine/mongodb-odm

composer config "platform.ext-mongo" "1.6.16" && composer require alcaeus/mongo-php-adapter
