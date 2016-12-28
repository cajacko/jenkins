To install all the dependencies run the following:

git clone https://github.com/cajacko/jenkins.git && cd jenkins
echo "DIGITAL_OCEAN_API_KEY=VALUE" >> .env
chmod +x ./install
./install

---

Run the jenkins container with the following (This needs to be outside of a shell script to work, for some reason):

docker run -d -p 8080:8080 -p 50000:50000 -v ~/keys:/var/jenkins_home/.ssh -v ~/backup:/var/jenkins_home --name jenkins charlie/jenkins

---

We then need to wait a few seconds for jenkins to start up, then run:

cat ~/backup/secrets/initialAdminPassword

----

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080
