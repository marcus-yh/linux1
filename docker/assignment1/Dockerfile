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
ENV USER_ID_BUILDER=60000
ENV GROUP_ID_BUILDER=0
ENV DEFAULT_SHELL=/bin/bash

# create nsswrapper.conf for dynamic uid
#RUN echo "passwd: files nss_wrapper" > /etc/nsswrapper.conf
#echo "group: files nss_wrapper" >> /etc/nsswrapper.conf

# add group and user
RUN adduser \
	--disabled-password \
	--home ${HOME} \
	--shell ${DEFAULT_SHELL} \
	--gecos "${FULL_NAME}" \
	--uid ${USER_ID_BUILDER} \
	--gid ${GROUP_ID_BUILDER} \
	${USER_NAME}



# add user to sudoers
#RUN echo "${USER_NAME} ALL=(ALL) NOPASSWD: /usr/sbin/user-mngt" \
#	> /etc/sudoers.d/${USER_NAME} && \
#	chmod 0440 /etc/sudoers.d/${USER_NAME}
#usermod -aG sudo ${USER_NAME} && \



# create app dir, populate with startup scripts and fix permissions
ENV APP_DIR /usr/src/app
RUN mkdir -p ${APP_DIR}
WORKDIR ${APP_DIR}
COPY ./bin/docker-entrypoint ./bin/docker-entrypoint
COPY ./bin/docker-dynamic-passwd ./bin/docker-dynamic-passwd
COPY ./bin/docker-fix-permissions ./bin/docker-fix-permissions
RUN ${APP_DIR}/bin/docker-fix-permissions ${APP_DIR}


# fix permissions on home directory
RUN chmod -R 774 ${HOME}

# ensure passwd is working together with lib-nsswrapper
#RUN sed -i 's/passwd: *files/passwd:\t\tfiles nss_wrapper/' /etc/nsswitch.conf && \
#	sed -i 's/group: *files/group:\t\tfiles nss_wrapper/' /etc/nsswitch.conf
RUN sed -i 's/passwd: *files/passwd:\t\tfiles nss_wrapper/' /etc/nsswitch.conf
#sed -i 's/group: *files/group:\t\tfiles nss_wrapper/' /etc/nsswitch.conf

# add ${APP_DIR}/bin to PATH 
ENV PATH=${APP_DIR}/bin:${PATH}

# copy user-mgnt to sbin directory and set permissions
COPY ./src/assignment1/user-mngt /usr/sbin/user-mngt
RUN chmod 751 $(which user-mngt)
# set default user
USER ${USER_ID_BUILDER}

# add default entrypoint
ENTRYPOINT ["docker-entrypoint"]

# default command
CMD ["/usr/bin/bash"]
