### Cart MVP

#### How to run this project

After cloning the repository, you need to go inside the directory where
you cloned the project and run the following commands:

```shell
# updating the laravel sail package
docker run --rm -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer update laravel/sail

# installing packages
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs

# creating local .env file
cp .env.example .env

# starting the containers
# this command may take a few minutes to finish, as it needs
# to build or download docker images
./vendor/bin/sail up -d

# adding an APP_KEY
./vendor/bin/sail artisan key:generate

# creating the database and running the migrations
./vendor/bin/sail artisan migrate
```

After running all the necessary commands, you can go to your
local browser at [http://localhost/](http://localhost/)

> NOTE: if you need to change the port for any Docker container, please
> adjust it inside the `docker-compose.yml` file.

#### Problems running the project

If you have a database connectivity issue when running the project,
please, run the following command:

```shell
# this will stop and remove the containers and their volumes
./vendor/bin/sail down --rmi all -v
```

After this, run the commands from the `How to run this project` step.

#### Postman testing

You can import the file `Cart-MVP.postman_collection.json` in your 
local Postman to test the project.

> NOTE: you need to have the project running in your local machine

#### How to run the tests

You can run the tests using the following command:

```shell
./vendor/bin/sail artisan test

# for code coverage, your .env file must have
# SAIL_XDEBUG_MODE=develop,debug,coverage
# and you need to stop and start your containers
# to view the tests results with code coverage, use this
./vendor/bin/sail artisan test --coverage
```

#### View OpenAPI documentation

To view the project OpenAPI document, you need to go to the [Swagger.io Online Editor](https://editor.swagger.io/)
and paste the contents of `openapi.json` located at the **root of the project folder.**
