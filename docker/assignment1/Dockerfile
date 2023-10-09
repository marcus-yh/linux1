FROM python:3.11-bookworm

# define apt dependencies
ENV APT_DEPS \
	libnss-wrapper \
	whois \
	sudo \
	bash \
	vim

# install apt dependencies
RUN apt update && \
	apt install -y ${APT_DEPS}

# define user variables
ENV USER_NAME=bobba
ENV FULL_NAME='Bobba Fett'
ENV HOME=/home/${USER_NAME}
ENV USER_ID_BUILDER=1000
ENV GROUP_ID_BUILDER=1000
ENV DEFAULT_SHELL=/bin/bash

# add group and user
RUN adduser \
	--disabled-password \
	--home ${HOME} \
	--shell ${DEFAULT_SHELL} \
	--gecos "${FULL_NAME}" \
	--uid ${USER_ID_BUILDER} \
	${USER_NAME}

# add user to sudoers
RUN echo "${USER_NAME} ALL=(ALL) NOPASSWD: /usr/sbin/user-mngt" \
	> /etc/sudoers.d/${USER_NAME}

# create app dir, populate with startup scripts and fix permissions
ENV APP_DIR /usr/src/app
RUN mkdir -p ${APP_DIR}
WORKDIR ${APP_DIR}
COPY ./bin/docker-entrypoint ./bin/docker-entrypoint
COPY ./bin/docker-dynamic-passwd ./bin/docker-dynamic-passwd
COPY ./bin/docker-fix-permissions ./bin/docker-fix-permissions
COPY ./bin/seed ./bin/seed
COPY ./bin/create-csv-data ./bin/create-csv-data
RUN ${APP_DIR}/bin/docker-fix-permissions ${APP_DIR}


# change owner of /usr/src/app
RUN chown -R ${USER_NAME} ${APP_DIR}

# fix permissions on home directory
RUN chmod -R 774 ${HOME}

# fix path 
ENV PATH=${PATH}:${APP_DIR}/bin

# copy user-mgnt to sbin directory and set permissions
COPY ./src/assignment1/user-mngt /usr/sbin/user-mngt
RUN chmod 751 $(which user-mngt)

# set default user
USER ${USER_ID_BUILDER}

# add default entrypoint
ENTRYPOINT ["docker-entrypoint"]

# default command
CMD ["/usr/bin/bash"]
