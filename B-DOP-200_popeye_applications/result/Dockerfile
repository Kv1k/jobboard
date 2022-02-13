FROM alpine:3.15

ENV NODE_VERSION 12.22.10

WORKDIR /usr/src/app

COPY package*.json ./

RUN npm install

COPY . .

EXPOSE 80

CMD [ "node", "server.js"  ]