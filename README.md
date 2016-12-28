RUN

git clone https://github.com/cajacko/jenkins.git
cd jenkins
echo "DIGITAL_OCEAN_API_KEY=VALUE" >> .env
chmod +x ./run
./run
