FROM ubuntu:23.10

# apt dependencies
ENV APT_DEPS \
    apache2

# define the html of page index.html
ENV HTML_CODE \
    <html> \
    <head> \
    \t<title> Linux4Ever </title> \
    <head> \
    <body> \
    \t<p> This page was created as a part of assignment 2 \
    </body> \
    </html>

# install apt dependencies
RUN apt update && \
    apt install -y ${APT_DEPS}

# create config file from default and adjust settings
#
# 1) cd into the sites-available directory
# 2) create a config file by copying the default config file
# 3) replace the default server admin email in the config file by using sed
# 4) configure the document root so that it points to the directory where the
#    html files of the site are placed
#
# Note:
# Using shell commands for cd and copy here in order to reflect a regular
# host installation
RUN cd /etc/apache2/sites-available && \
    cp 000-default.conf gci.conf && \
    sed -i 's/^.*ServerAdmin .*$/\tServerAdmin marcus.brannvall@yh.nackademin.se/' gci.conf && \
    sed -i 's/^.*DocumentRoot .*$/DocumentRoot /var/www/gci/' gci.conf && \
    sed -i 's/<\/VirtualHost>/\tServerName marcus-yh.local\n<\/VirtualHost>/' gci.conf

# create website dir and index.html
RUN mkdir /var/www/gci && \
    echo -e "${HTML_CODE}" > /var/www/gci/index.html

# activate virtual host file
RUN a2ensite /etc/apache2/site-available/gci.conf


CMD ["/bin/bash", "-c", "service apache2 reload"]