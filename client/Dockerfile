FROM ubuntu:21.04

RUN apt update \
	&& apt install -y git vim 

COPY ./python /home/client/python

WORKDIR /home/client

