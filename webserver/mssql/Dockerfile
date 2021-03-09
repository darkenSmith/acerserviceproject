FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

ARG APT_KEY_DONT_WARN_ON_DANGEROUS_USAGE=1

# Install SQL Server Agent (recommended)
ENV SQL_ENABLE_AGENT='y'

RUN apt-get update; \
    apt-get install -y --no-install-recommends ca-certificates wget gnupg sudo

RUN wget -qO- https://packages.microsoft.com/keys/microsoft.asc | apt-key add -

#RUN add-apt-repository "$(wget -qO- https://packages.microsoft.com/config/ubuntu/18.04/mssql-server-2019.list)"
RUN wget -qO- https://packages.microsoft.com/config/ubuntu/18.04/mssql-server-2019.list -O /etc/apt/sources.list.d/mssql.list

ARG ACCEPT_EULA=Y

RUN wget -qO- https://packages.microsoft.com/config/ubuntu/20.04/prod.list -O /etc/apt/sources.list.d/mssql-tools.list

RUN apt-get update; \
    apt-get install -y mssql-server mssql-tools

#ARG MSSQL_PID
#ARG MSSQL_SA_PASSWORD
#ARG MSSQL_DATA_DIR
#ARG MSSQL_LOG_DIR
#ARG ACCEPT_EULA=Y

ENV PATH "$PATH:/opt/mssql-tools/bin"

#USER mssql

# running mssql-conf does not seem to work...
#RUN  /opt/mssql/bin/mssql-conf -n setup

CMD ["/opt/mssql/bin/sqlservr"]