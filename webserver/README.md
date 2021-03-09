# Web server Docker compose deployment

This is a set of docker images built specifically for Stone Group to replicate the web production environment

The project is split in 3 files:

- A base `docker-compose.yml`
    - this will deploy the base requirements, that is PHP-FPM (with Microsoft ODBC MSSQL drivers) + Apache
- A `docker-compose.mysql.yml`
    - as the name suggests, this will deploy also a MySQL container
- A `docker-compose.mssql.yml`
    - that will take care of deploying a MSSQL container

To get a set of the base containers (php-fpm + apache) just type:
```shell
docker-compose up --build
```

Or if you would like to run it in detached mode:
```shell
docker-compose up -d --build
```

If you want to run the base (php-fpm + apache) with MySQL only:
```shell
docker-compose -f docker-compose.yml -f docker-compose.mysql.yml up --build
```

or alternatively for MSSQL:
```shell
docker-compose -f docker-compose.yml -f docker-compose.mysql.yml up --build
```

If you need to run everything (apache + php-fpm + MySQL + MSSQL):
```shell
docker-compose -f docker-compose.yml -f docker-compose.mysql.yml -f docker-compose.mssql.yml up --build
```

There are also some parameters (like exposed ports) that can be tweaked on the `.env` file present in the root folder.

When running, a set of folders will be created on a level up from the `docker-compose.yml` file location:
 - **database:** will hold the database files
 - **logs:** keeps log files for the running services if they are not being output to stdout/stderr (to be viewed via docker logs)
 - **html:** to keep the files to be served by apache

 *The MSSQL container has some issues with certain filesystems, so the files and logs are stored in a volume that is not accessible under the previous mentioned ones. Logs should be also printed to the docker logs if there is anything relevant. Please also be aware that MSSQL is very verbose when starting up*