# Notes
Build docker image with a Tag
```bash
docker build -t <image-name>:v1 .
```

Run docker container with a Tag
```bash
docker run -d -p 8080:80 <image-name>:v1
```

Get container ID
```bash
docker ps
```

To stop a running container
```bash
docker stop <container-id>
```

# Challenge 4
## Mounting binds 
```bash
docker run -d -p 8080:80 -it --name <image-name> --mount type=bind,source="$(pwd)"/todo.json,target=/var/www/html/api/todo.json mikael-todos:v1
```

# Challenge 5
## Adding environment variables
```bash
docker run -d -p 8080:80 -e NAME=Mikael -e SURNAME=Ismail -it --name mikael-todos --mount type=bind,source="$(pwd)"/todo.json,target=/var/www/html/api/todo.json mikael-todos
```


# Challenge 6
## Pulling from Docker Hub
```bash
docker build -t mikaelismail1/todos:v1 .
docker push mikaelismail1/mikael-todos:v1
docker pull mikaelismail1/mikael-todos:v1
```

## Building Docker image from docker hub
```bash
challenge_three % docker run -d -p 8089:80 -e NAME=Mikael -e SURNAME=Ismail -it --mount type=bind,source="$(pwd)"/todo.json,target=/var/www/html/api/todo.json mikaelismail1/todos:v2
challenge_three % docker run -d -p 8088:80 -e NAME=Mikael -e SURNAME=Ismail -it --mount type=bind,source="$(pwd)"/todo.json,target=/var/www/html/api/todo.json mikaelismail1/todos:v1
```