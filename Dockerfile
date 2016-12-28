FROM jenkins

MAINTAINER Charlie Jackson <contact@charliejackson.com>

ARG DIGITAL_OCEAN_API_KEY

USER root

RUN apt-get update
RUN apt-get install -y php5
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
COPY . /home/jenkins
# RUN chown -R jenkins:jenkins /home/jenkins

# USER jenkins

RUN cd /home/jenkins/setup && composer install

# CMD php /home/jenkins/setup/setup.php
