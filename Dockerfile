FROM debian:latest

# define apt dependencies
ENV APT_DEPS = nodejs \
		npm

# define npm dependencies
ENV APT_DEPS = nodejs \
ENV NPM_DEPS = bats

# install apt dependencies
RUN apt update && \
	apt upgrade && \
	apt install ${APT_DEPS}

# install npm dependencies
RUN npm install -g ${NPM_DEPS}

# copy scripts
COPY ./scripts/entrypoint.sh /usr/local/bin/entrypoint.sh

# default entrypoint
ENTRYPOINT ['sh', '-c', 'entrypoint.sh']

# default command
CMD ['bash']
