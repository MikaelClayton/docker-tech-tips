# Docker Tech Tips

## Build Docker Image
- To build a docker image, run the following command in the directory where the Dockerfile is located.
- Replace `<image-name>` with the name of the image you want to build.
- -t flag is used to tag the image with a name.

`
    docker build -t <image-name> .
`

## Run Docker Container
- To run a docker container, run the following command.
- Replace `<image-name>` with the name of the image you want to run.
- -it flag is used to run the container in interactive mode.
- --rm flag is used to remove the container after it is stopped.

`
docker run -it --rm <image-name>
`