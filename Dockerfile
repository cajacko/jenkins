FROM jenkins

MAINTAINER Charlie Jackson <contact@charliejackson.com>

USER root

RUN apt-get update
RUN apt-get install -y php5

USER jenkins