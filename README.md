Prerequired
1. Install Docker. Please following instruction of this website: https://www.docker.com/products/docker-desktop
2. Install Docker-compose. Please following instruction of this website: https://docs.docker.com/compose/install/

#### How to run
```
docker-compose --env-file api/.env up -d --build
docker-compose --env-file api/.env exec api composer install
docker-compose --env-file api/.env exec api bin/console doctrine:migrations:migrate --no-interaction
docker-compose --env-file api/.env exec frontend npm install
docker-compose --env-file api/.env exec frontend npm run serve
```

####  Open

[http://localhost:8080](http://localhost:8080);

#### Hints
1. I limited the output to the backend in order to implement pagination on frontend. In order for pagination to send a request to the backend, it is necessary to slightly modify the request and the operation of the pagination component.
2. I don't write tests because I had limited by time.
3. Unfortunately I did not have time to implement the login to the frontend part
