FROM php:7.3-fpm
 
ARG PHP_ROOT_DIR
ARG WEB_USER
ARG WEB_GROUP
ARG PHP_FPM_PORT
  
RUN apt-get update; \
    apt-get install -y --no-install-recommends gnupg libpng-dev libicu-dev libxslt-dev libzip-dev unixodbc-dev; \
    rm -rf /var/lib/apt/lists/*

# already enabled by default: json mbstring readline xml
RUN docker-php-ext-install bcmath gd intl mysqli opcache pdo_mysql soap xsl zip
 
# Add Microsoft repo for Microsoft ODBC Driver 17 for Linux
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - \
    && curl https://packages.microsoft.com/config/debian/9/prod.list > /etc/apt/sources.list.d/mssql-release.list

# Add Microsoft repo for Microsoft ODBC Driver 17 for Linux
RUN apt-get update && ACCEPT_EULA=Y apt-get install -y \
    apt-transport-https \
    msodbcsql17

# Enable the php extensions.
RUN pecl install pecl/pdo_sqlsrv-5.8.1 pecl/sqlsrv-5.8.1

RUN docker-php-ext-enable pdo_sqlsrv sqlsrv pdo_mysql

COPY www.conf ${PHP_ROOT_DIR}/php-fpm.d/www.conf

RUN sed -i -e "s/{{ WEB_USER }}/$WEB_USER/g" \
           -e "s/{{ WEB_GROUP }}/$WEB_GROUP/g" \
           -e "s/{{ PHP_FPM_PORT }}/$PHP_FPM_PORT/g" "${PHP_ROOT_DIR}/php-fpm.d/www.conf"

# remove other pool files
RUN rm ${PHP_ROOT_DIR}/php-fpm.d/docker.conf "${PHP_ROOT_DIR}/php-fpm.d/zz-docker.conf"

COPY php.ini ${PHP_INI_DIR}/php.ini