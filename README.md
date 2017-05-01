To install all the dependencies run the following (Replace __DO_VALUE__ with your Digital ocean api key and __JT_VALUE__ with your desired key tag name for Jenkins):

```
cd /home
git clone https://github.com/cajacko/jenkins.git && cd /home/jenkins
echo "DIGITAL_OCEAN_API_KEY=DO_VALUE" >> .env
echo "JENKINS_TAG_NAME=JT_VALUE" >> .env
chmod +x /home/jenkins/install && chmod +x /home/jenkins/keys && chmod +x /home/jenkins/update
/home/jenkins/install
/home/jenkins/keys
```

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080

Jenkins runs on port 8080 by default to also run it on port 80 add the following to: /etc/rc.local
```
#Requests from outside
iptables -t nat -A PREROUTING -p tcp --dport 80 -j REDIRECT --to-ports 8080
#Requests from localhost
iptables -t nat -I OUTPUT -p tcp -d 127.0.0.1 --dport 80 -j REDIRECT --to-ports 8080
```
Just before line that reads: exit 0

Then run the following the enable port forwarding:
```
sudo /etc/rc.local
```
Now if you create an A record in your DNS to point to the IP Address of the server you can access Jenkins through that subdomain.

You can update jenkins by running:
```
/home/jenkins/update
```
