FROM alpine/git AS builder

RUN git clone https://github.com/coreruleset/coreruleset /tmp/owasp-modsecurity-crs

FROM ubuntu:20.04

ARG APACHE_SSL_EXPOSED_PORT
ARG COMPOSE_PROJECT_NAME
ARG WEB_USER
ARG WEB_GROUP
ARG WEB_FOLDER
ARG PHP_FPM_PORT

ENV TZ=Europe/London
ENV DEBIAN_FRONTEND=noninteractive

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update -qq && \
    apt-get install -qq -y --no-install-recommends --no-install-suggests \
      apache2 libcurl3-gnutls libapache2-mod-security2 libapache2-mod-evasive libapache2-mod-fcgid \
      modsecurity-crs libxml2 libyajl2 ssl-cert ssdeep gettext-base && \
    apt-get clean && rm -rf /var/lib/apt/lists/*

# START modevasive config bits
COPY evasive.conf /etc/apache2/mods-available/evasive.conf

RUN mkdir /var/log/mod_evasive

RUN chown ${WEB_USER}:${WEB_GROUP} /var/log/mod_evasive
RUN chmod 755 /var/log/mod_evasive
# END modevasive config bits

# START modsecurity config bits
# copy recommended config file for modsecurity
RUN mv /etc/modsecurity/modsecurity.conf-recommended /etc/modsecurity/modsecurity.conf

# copy config and rules
COPY --from=builder /tmp/owasp-modsecurity-crs/crs-setup.conf.example /etc/modsecurity/crs/crs-setup.conf
COPY --from=builder /tmp/owasp-modsecurity-crs/rules/REQUEST-900-EXCLUSION-RULES-BEFORE-CRS.conf.example /etc/modsecurity/crs/REQUEST-900-EXCLUSION-RULES-BEFORE-CRS.conf
COPY --from=builder /tmp/owasp-modsecurity-crs/rules/RESPONSE-999-EXCLUSION-RULES-AFTER-CRS.conf.example /etc/modsecurity/crs/RESPONSE-999-EXCLUSION-RULES-AFTER-CRS.conf
COPY --from=builder /tmp/owasp-modsecurity-crs/rules /usr/share/modsecurity-crs/

# touch modsecurity whitelist - maybe not necessary here
RUN touch /etc/modsecurity/whitelist.conf

#RUN sed -i -e "s/^(# *)?SecAuditLogFormat /SecAuditLogFormat JSON/g" /etc/modsecurity/modsecurity.conf
RUN echo "SecAuditLogFormat JSON" >> /etc/modsecurity/modsecurity.conf
# END modsecurity config bits

# disable serversignature and set servertokens to prod
RUN sed -i -e 's/ServerSignature On/ServerSignature Off/g' \
           -e 's/ServerTokens OS/ServerTokens Prod/g'  /etc/apache2/conf-enabled/security.conf

# security headers
RUN sed -i -r -e 's/^(# *)?Header set X-Frame-Options: "sameorigin"/Header set X-Frame-Options: "sameorigin"/g' \
              -e 's/^(# *)?Header set X-Content-Type-Options: "nosniff"/Header set X-Content-Type-Options: "nosniff"/g' /etc/apache2/conf-enabled/security.conf

RUN sed -i "\$i #\n# Additional security headers\n#\nHeader set X-XSS-Protection 1;mode=block\nHeader unset X-Powered-By\nHeader set Referrer-Policy: strict-origin-when-cross-origin\n" /etc/apache2/conf-enabled/security.conf

# update directoryindex
RUN sed -i -e 's/^\t*DirectoryIndex .*/\tDirectoryIndex index.html index.php index.htm/g' /etc/apache2/mods-enabled/dir.conf

# disable prefork so we can run event for http2
RUN a2dismod mpm_prefork

# enable for php-fpm
RUN a2enmod proxy_fcgi mpm_event http2 ssl rewrite headers setenvif

RUN a2ensite default-ssl.conf

RUN echo "ServerName $COMPOSE_PROJECT_NAME" >> /etc/apache2/apache2.conf

COPY default.conf /etc/apache2/sites-available/000-default.conf
COPY default-ssl.conf /etc/apache2/sites-available/default-ssl.conf



RUN sed -ri -e 's!^(\s*CustomLog)\s+\S+!\1 /proc/self/fd/1!g' \
		    -e 's!^(\s*ErrorLog)\s+\S+!\1 /proc/self/fd/2!g' "/etc/apache2/apache2.conf"

#RUN sed -ri -e 's/Listen 80/Listen 8080/g' \
#		    -e 's/Listen 443/Listen 8443/g' "/etc/apache2/ports.conf"

RUN sed -i -e "s/{{ APACHE_SSL_EXPOSED_PORT }}/$APACHE_SSL_EXPOSED_PORT/g" \
           -e "s@{{ WEB_FOLDER }}@$WEB_FOLDER@g" \
           -e "s/{{ PHP_FPM_PORT }}/$PHP_FPM_PORT/g" /etc/apache2/sites-available/000-default.conf

RUN sed -i -e "s@{{ WEB_FOLDER }}@$WEB_FOLDER@g" \
           -e "s/{{ PHP_FPM_PORT }}/$PHP_FPM_PORT/g" /etc/apache2/sites-available/default-ssl.conf
#RUN envsubst < /etc/apache2/sites-available/000-default.conf.template > /etc/apache2/sites-available/000-default.conf

RUN ln -sf /proc/self/fd/1 /var/log/apache2/access.log && \
    ln -sf /proc/self/fd/1 /var/log/apache2/error.log

EXPOSE 80 443

CMD ["apachectl", "-D", "FOREGROUND"]