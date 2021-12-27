FROM python:latest

RUN pip install --upgrade pip

WORKDIR /srv/app

COPY ./src/main.py ./src

CMD ["python", "src/main.py"]