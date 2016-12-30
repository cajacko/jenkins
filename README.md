To install all the dependencies run the following (Replace __VALUE__ with your Digital ocean api key):

```
cd /home
git clone https://github.com/cajacko/jenkins.git && cd /home/jenkins
echo "DIGITAL_OCEAN_API_KEY=VALUE" >> .env
chmod +x /home/jenkins/install && chmod +x /home/jenkins/keys
/home/jenkins/install
/home/jenkins/keys
```

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080
