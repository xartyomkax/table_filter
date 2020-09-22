Prerequired
1. Install Docker. Please following instruction of this website: https://www.docker.com/products/docker-desktop
2. Install Docker-compose. Please following instruction of this website: https://docs.docker.com/compose/install/

How to run
```
docker-compose --env-file api/.env run frontend npm install
docker-compose --env-file api/.env up -d --build
docker-compose --env-file api/.env exec api composer install
docker-compose --env-file api/.env exec api bin/console doctrine:migrations:migrate --no-interaction
```

- Open [http://localhost:8080](http://localhost:8080);
