FROM debian:latest

# define apt dependencies
ENV APT_DEPS \
	nodejs \
	npm

# define npm dependencies
ENV NPM_DEPS \
	bats

# install apt dependencies
RUN apt update && \
	apt upgrade && \
	apt install -y ${APT_DEPS}

# install npm dependencies
RUN npm install -g ${NPM_DEPS}

ENV APP_DIR /usr/src/app
RUN mkdir -p ${APP_DIR}

WORKDIR ${APP_DIR}


# copy scripts
COPY ./bin/docker-entrypoint /usr/local/bin/docker-entrypoint

# default entrypoint
ENTRYPOINT ["docker-entrypoint"]

# default command
CMD ["/usr/bin/bash"]
