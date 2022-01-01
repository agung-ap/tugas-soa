FROM ubuntu:21.04

LABEL maintainer="agung aprianto"

ENV DEBIAN_FRONTEND = noninteractive

RUN apt-get update -y \
	&& apt-get upgrade -y \
	&& apt-get install -y git \
		vim \
		wget \
		tar \
		golang-go \
		python3 \
		python3-pip \
		default-jdk \
	&& pip install requests

COPY . /home/client

WORKDIR /home/client

