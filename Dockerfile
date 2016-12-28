FROM jenkins

MAINTAINER Charlie Jackson <contact@charliejackson.com>

ARG DIGITAL_OCEAN_API_KEY

USER root

RUN apt-get update
RUN apt-get install -y php5
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN git clone https://github.com/cajacko/jenkins.git /home/jenkins
RUN chown -R jenkins:jenkins /home/jenkins

USER jenkins

RUN cd /home/jenkins/setup && composer install
# RUN ssh-keygen -f /var/jenkins_home/.ssh/id_rsa -t rsa -N ''
# RUN cp /var/jenkins_home/.ssh/id_rsa.pub /home/jenkins/ssh-key.txt
# RUN php /home/jenkins/setup/setup.php
