FROM ubuntu:21.04

LABEL maintainer="agung aprianto"

ENV DEBIAN_FRONTEND = noninteractive

RUN apt-get update -y \
	&& apt-get upgrade -y \
	&& apt-get install -y git \ 
		vim \
		wget \
		tar \
		python3 \
		default-jdk

COPY ./python /home/client/python

WORKDIR /home/client

