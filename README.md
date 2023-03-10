# PingDateTime
Web application that can ping or get the date time for Asia/Manila as default setting.

Technology used:

    1. Laravel
    2. Vuejs
    3. Mysql
    4. NodeJs
    5. Docker

SSH - https://github.com/tristanantazo/PingDateTime.git

```
#system limitation:

    Due to docker issue the client can't connect to the NodeJs application 
    as nodejs refuse to connect

#What I did is:

    I used the public api made by WorldTimeApi

    http://worldtimeapi.org/api/timezone/:area/:location

    As default, this api will return and datetime will be saved in "body" column and 
    the header will be at "header" column.

```

# Steps to run
 
1. Copy the git, you will see the backend and client folder, client folder is where
laravel and vuejs, and for backend you will see a simple nodejs api.

    #note: make sure that your docker is running in the background.

2. In your terminal, go to the folder client and inside the client run
"make build" after make build you will run the "make bash"

    #note: make build - this will build your dockerfile
            make bash - it will go to your docker app terminal

3. Inside the docker app terminal run this command:

        composer install
        npm install


```
#note: make sure that the .env file has this database credentials

DB_CONNECTION=mysql
DB_HOST=client-mysql
DB_PORT=3306
DB_DATABASE=clientdb
DB_USERNAME=root
DB_PASSWORD=root123
```
4. After that you will run: 

```
php artisan migrate
php artisan db:seed
#note: it will make your database and generate some records.
```
5. Run the npm: 
```
npm run dev
```

# For Backend Steps
1. in the terminal go to the backend folder and run:
```
npm install

docker compose build
```
2. after building run:
```
docker compose up

npm run watch

#note: that the nodemon should be running at port 4139
```
