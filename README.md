# {DV.Campus} 2021-2022 demo project #

Fullstack development demo project

# Local development #

The project can be run with Apache/Nginx and is compatuble with [Default Value Docker infrastructure](https://github.com/DefaultValue/docker_infrastructure).
Alternatively, you can add a MySQL container to this composition and bind ports to run it.

To start project with [Default Value Docker infrastructure](https://github.com/DefaultValue/docker_infrastructure):

1. Clone the project
2. Generate SSL certificate
3. Append certificate information to `${PROJECTS_ROOT_DIR}/docker_infrastructure/local_infrastructure/configuration/certificates.toml`
4. Add domains to the `/etc/hosts` file
5. Start Docker composition
6. Install Composer dependencies
7. Create MySQL user, DB and grant permissions
8. Setup DB schema and data
9. Optional: generate test data

```bash
1. Clone the project
cd $PROJECTS_ROOT_DIR
git clone https://github.com/annamdv/anna-mukomela.git

2. Generate SSL certificate
cd $SSL_CERTIFICATES_DIR
mkcert -cert-file=anna-mukomela.local+1.pem -key-file=anna-mukomela.local+1-key.pem anna-mukomela.local www.anna-mukomela.local

3. Append certificate information
echo '
  [[tls.certificates]]
    certFile = "/certs/anna-mukomela.local+1.pem"
    keyFile = "/certs/anna-mukomela.local+1-key.pem"
' >> ${PROJECTS_ROOT_DIR}/docker_infrastructure/local_infrastructure/configuration/certificates.toml

4. Add domains to the `/etc/hosts` file
echo '127.0.0.1 anna-mukomela.local www.anna-mukomela.local' | sudo tee -a /etc/hosts

5. Start Docker composition
cd ${PROJECTS_ROOT_DIR}anna-mukomela.local/
docker-compose up -d

6. Install Composer dependencies
docker exec -it anna-mukomela.local composer install

7. Create MySQL user, DB and grant permissions
mysql -uroot -proot -h127.0.0.1 --port=3380 -e 'SOURCE config/init.sql'

8. Setup DB schema and data
curl http://anna-mukomela.local/install

9. Optional: generate test data #
docker exec -it anna-mukomela.local php bin/console install:generate-data
```
