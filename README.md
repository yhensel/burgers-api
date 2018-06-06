# users-api
Dummy lumen api so yo can test your client applications, just for practice

The project is actually using the Laravel Passport library that means that the auth system that is being used is **Oauth2** 

# Deploy

```sh
composer install
```

**.env example**

```sh
 APP_ENV=local
 APP_DEBUG=true
 APP_KEY=
 APP_TIMEZONE=UTC
 APP_URL=http://users-api.test
 APP_NAME=Users-api
 
 LOG_CHANNEL=stack
 LOG_SLACK_WEBHOOK_URL=
 
 DB_CONNECTION=mysql
 DB_HOST=127.0.0.1
 DB_PORT=3306
 DB_DATABASE=users-api
 DB_USERNAME=root
 DB_PASSWORD=secret
 
 CACHE_DRIVER=file
 QUEUE_DRIVER=sync
 ```

**Seed the Database**
```sh
php artisan migrate:fresh --seed
```
 
**Install the passport keys**
```sh
php artisan passport:install 
```

Now you're ready to run

# Request examples 

**Login**
```sh
curl -X POST \
  http://users-api.test/oauth/token \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: b922bf1b-e52e-4599-9f83-14cad4bcfe46' \
  -d 'grant_type=password&client_id=1&client_secret=secret&username=yhensel%40example.com&password=secret'
```

**Create a user**
```sh
curl -X POST \
  http://users-api.test/register \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: 04895adb-9daa-414a-a54a-a5c5c219169c' \
  -d 'grant_type=password&client_id=1&client_secret=1&name=Yhensel%20Benitez&email=yhensel%40exam.com&password=secret&confirm_password=secret'
```

**Update a user**
```sh
curl -X PUT \
  http://users-api.test/users/1/update \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: fbd108cd-ade5-4af7-9fe8-1fdc24c02773' \
  -d 'name=Yhensel%20Benitez&email=yhensel%40example.com&password=secret&new_password=123456&confirm_password=123456'
```

**Delete a user**

```sh
curl -X DELETE \
  http://users-api.test/users/1/delete \
  -H 'Cache-Control: no-cache' \
  -H 'Content-Type: application/x-www-form-urlencoded' \
  -H 'Postman-Token: d45d654b-8333-4f21-8b0b-96d43ce6f550' \
  -d password=secret
```


