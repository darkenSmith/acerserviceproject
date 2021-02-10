# Web server Docker compose deployment

This is a set of docker images built specifically for Stone Group to replicate the web production environment

The docker compose file will deploy 3 containers:
- apache
- php-fpm (with Microsoft ODBC drivers)
- mysql

To get a set of the images running just type:

```shell
docker-compose up --build
```

Or if you would like to run it in detached mode:

```shell
docker-compose up -d --build
```

When running, a set of folders will be created on a level up from the `docker-compose.yml` file location:
 - database: will hold the database files
 - logs: keeps log files for the running services if they are not being output to stdout/stderr (to be viewed via docker logs)
 - html: to keep the files to be server by apache