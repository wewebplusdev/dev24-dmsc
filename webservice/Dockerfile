FROM node:lts-alpine
RUN mkdir -p /usr/src/app
WORKDIR /usr/src/app
COPY ["./src/package.json", "./src/package-lock.json*", "./"]
COPY ./src .

RUN npm install -g nodemon
RUN npm install

EXPOSE 3500