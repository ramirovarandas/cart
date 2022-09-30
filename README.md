### Cart MVP

#### How to run this project

After cloning the repository, you need to go inside the directory where
you cloned the project and run the following commands:

```shell
composer install

# this command may take a few minutes to finish, as it needs
# to build or download docker images
sail up -d
```

After running all the necessary commands, you can go to your
local browser at [http://localhost/](http://localhost/)

> NOTE: if you need to change the port for any Docker container, please
> adjust it inside the `docker-compose.yml` file.

#### Postman testing

You can import the file `Cart-MVP.postman_collection.json` in your 
local Postman to test the project.

> NOTE: you need to have the project running in your local machine

#### How to run the tests

You can run the tests using the following command:

```shell
sail artisan test

# for code coverage, your .env file must have
# SAIL_XDEBUG_MODE=develop,debug,coverage
# and you need to stop and start your containers
# to view the tests results with code coverage, use this
sail artisan test --coverage
```

#### View OpenAPI documentation

To view the project OpenAPI document, you need to go to the [Swagger.io Online Editor](https://editor.swagger.io/)
and paste the contents of `openapi.json` located at the **root of the project folder.**
