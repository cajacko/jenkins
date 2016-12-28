To install all the dependencies run the following:

git clone https://github.com/cajacko/jenkins.git && cd jenkins
export DIGITAL_OCEAN_API_KEY="VALUE"
chmod +x ./install
./install

---

Run the jenkins container with the following (This needs to be outside of a shell script to work, for some reason):

docker run -d -p 8080:8080 -p 50000:50000 -v /var/jenkins_home --name jenkins charlie/jenkins

---

We then need to wait a few seconds for jenkins to start up, then run:

docker exec -i -t jenkins /bin/bash
cat /var/jenkins_home/secrets/initialAdminPassword

----

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080
