FROM jenkins

MAINTAINER Charlie Jackson <contact@charliejackson.com>

USER root

RUN apt-get update
RUN apt-get install -y php5
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN git clone https://github.com/cajacko/jenkins.git /home/jenkins

USER jenkins

RUN cd /home/jenkins/setup && composer install
RUN php /home/jenkins/setup/setup.php
