RUN

git clone https://github.com/cajacko/jenkins.git && cd jenkins
export DIGITAL_OCEAN_API_KEY="VALUE"
chmod +x ./install
./install
docker run -d -p 8080:8080 -p 50000:50000 -v /var/jenkins_home --name jenkins charlie/jenkins

---

We then need to wait a few seconds for jenkins to start up, then:

RUN

docker exec -i -t jenkins /bin/bash
cat /var/jenkins_home/secrets/initialAdminPassword

----

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080
