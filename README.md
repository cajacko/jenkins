To install all the dependencies run the following (Replace __VALUE__ with your Digital ocean api key):

```
git clone https://github.com/cajacko/jenkins.git && cd jenkins
echo "DIGITAL_OCEAN_API_KEY=__VALUE__" >> .env
chmod +x ./install && ./install
```

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080
