FROM python:3

WORKDIR /usr/src/app

COPY requirements.txt ./
RUN pip3 install -r requirements.txt

COPY app.py ./

ENV FLASK_APP=app.py

RUN flask run --host=0.0.0.0 --port=80

COPY . .

CMD [ "python", "app.py" ]