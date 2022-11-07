FROM kooldev/php:8.1-nginx-prod

ENV LD_LIBRARY_PATH /usr/local/instantclient
ENV ORACLE_HOME /usr/local/instantclient

# Download and unarchive Instant Client v11
RUN apk add --update libaio libnsl && \
  curl -o /tmp/instaclient-basic.zip https://raw.githubusercontent.com/bumpx/oracle-instantclient/master/instantclient-basic-linux.x64-11.2.0.4.0.zip && \
  curl -o /tmp/instaclient-sdk.zip https://raw.githubusercontent.com/bumpx/oracle-instantclient/master/instantclient-sdk-linux.x64-11.2.0.4.0.zip && \
  curl -o /tmp/instaclient-sqlplus.zip https://raw.githubusercontent.com/bumpx/oracle-instantclient/master/instantclient-sqlplus-linux.x64-11.2.0.4.0.zip && \
  unzip -d /usr/local/ /tmp/instaclient-basic.zip && \
  unzip -d /usr/local/ /tmp/instaclient-sdk.zip && \
  unzip -d /usr/local/ /tmp/instaclient-sqlplus.zip && \
  ln -s /usr/local/instantclient_11_2 ${ORACLE_HOME} && \
  ln -s ${ORACLE_HOME}/libclntsh.so.* ${ORACLE_HOME}/libclntsh.so && \
  ln -s ${ORACLE_HOME}/libocci.so.* ${ORACLE_HOME}/libocci.so && \
  ln -s ${ORACLE_HOME}/lib* /usr/lib && \
  ln -s ${ORACLE_HOME}/sqlplus /usr/bin/sqlplus && \
  ln -s /usr/lib/libnsl.so.2  /usr/lib/libnsl.so.1 && \
  docker-php-ext-configure oci8 --with-oci8=instantclient,$ORACLE_HOME && \
  docker-php-ext-install oci8
