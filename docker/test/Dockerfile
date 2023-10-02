FROM python:3.11-bookworm

ENV APT_DEPS \
	libnss-wrapper \
	whois \
	sudo \
	bash


# install apt dependencies
RUN apt update && \
	apt install -y ${APT_DEPS}

ENV USER_NAME=bobba
ENV FULL_NAME='Bobba Fett'
ENV HOME=/home/${USER_NAME}
ENV USER_ID=1000
ENV GROUP_ID=1000
ENV DEFAULT_SHELL=/bin/bash


RUN echo "passwd: files nss_wrapper" > /etc/nsswrapper.conf \
	echo "group: files nss_wrapper" >> /etc/nsswrapper.conf

# add group and user
#RUN addgroup --gid ${GROUP_ID} ${USER_NAME} && \
RUN	adduser \
	--disabled-password \
	--home ${HOME} \
	--shell ${DEFAULT_SHELL} \
	--gecos "${FULL_NAME}" \
	--uid ${USER_ID} \
	#	--gid ${GROUP_ID} \
	${USER_NAME}

# add user to sudoers
# RUN usermod -aG sudo ${USER_NAME}

RUN echo "${USER_NAME} ALL=(ALL) NOPASSWD: /usr/sbin/user-mngt" > \
	/etc/sudoers.d/${USER_NAME} && \
	chmod 0440 /etc/sudoers.d/${USER_NAME}

COPY ./src/assignment1/user-mngt /usr/sbin/user-mngt
RUN chmod go-wx $(which user-mngt)


# default command
CMD ["/usr/bin/bash"]