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

## Challenge 3

Using a dockerfile to build an image and run a container
```bash
services:
  frontend:
    build: ./frontend/
    ports:
      - 8080:80
  backend:
    build: ./backend/
    volumes:
      - ./backend/todo.json:/var/www/html/api/todo.json
    env_file:
      - backend/.env
    ports:
      - 3000:80
```