FROM ubuntu:latest

RUN apt-get update && apt-get install -y && apt-get install jp2a -y

COPY . .
WORKDIR .

CMD jp2a --colors divblox_logo.png