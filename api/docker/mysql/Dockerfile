FROM mysql:8.0

COPY dump/createdb.sql /docker-entrypoint-initdb.d/createdb.sql
COPY config.cnf /etc/mysql/conf.d/config.cnf
RUN chown mysql:mysql /etc/mysql/conf.d/config.cnf
RUN chmod 600 /etc/mysql/conf.d/config.cnf

CMD ["mysqld"]

EXPOSE 3306
