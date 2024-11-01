# Challenge 1

## Docker Compose


### Create a docker-compose file
```bash
services:
  docker-tech-tips:
    image: mikaelismail1/todos:v2
    volumes:
      - ./todo.json:/var/www/html/api/todo.json
    env_file:
      - .env
    ports:
      - 8080:80
```



```bash
docker-compose up
```