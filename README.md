To install all the dependencies run the following:

---
git clone https://github.com/cajacko/jenkins.git && cd jenkins
echo "DIGITAL_OCEAN_API_KEY=61e381b8f48fb2f481fcf921343d000db44f5c41b593111935509100f216c211" >> .env
chmod +x ./install && ./install
---

The output of the last command will give you the admin password to login to the Jenkins server on http://IP_ADDRESS:8080
