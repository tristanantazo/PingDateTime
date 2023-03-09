FROM node:lts-alpine
EXPOSE 4139

WORKDIR /usr/src/app

COPY package*.json ./

RUN npm i

COPY . .


CMD [ "nodemon", "server.js" ]