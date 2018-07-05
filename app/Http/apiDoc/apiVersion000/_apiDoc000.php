<?php

/**
 * @apiDefine BearerToken
 *
 *
 * @apiHeader Authorization='Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMyZmE2ZTJiNjdlYzg5YTgyMjY2ZmFmOTE0MzE3YWJhNTFiNzBkNjhlZmJjMGJlMTkzNTBiOGQ0Yzg1Zj...' Bearer Token remember to add the 'Bearer prefix'
 */

/**
 * @apiVersion 0.0.0
 * @apiUse BearerToken
 *
 * @api {get} /users List
 * @apiGroup User
 *
 * @apiParam {String} [search]      Used to filter the results.
 *
 * @apiSuccess {String} name      User\'s name.
 * @apiSuccess {String} email     User\'s email.
 * @apiSuccess {Date} updated_at  User\'s updated_at date.
 * @apiSuccess {Date} created_at  User\'s created_at date.
 * @apiSuccess {Number} id        User\'s Unique Id.
 *
 * @apiSampleRequest /users
 *
 * @apiParamExample {curl} Request-Example:
 * curl -X GET \
 * http://users-api.test/users \
 * -H 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjljZTZmMmRkNGVjZjZiMjJhODFmZmE4YWU3YmU4MTI1OTRjMjMxZDI5OTJkZDk4OWY3YjZmYmU1ZDVhYzI5Zjk4NjUzMzM0ZjFjMzU4MmVlIn0.eyJhdWQiOiIxIiwianRpIjoiOWNlNmYyZGQ0ZWNmNmIyMmE4MWZmYThhZTdiZTgxMjU5NGMyMzFkMjk5MmRkOTg5ZjdiNmZiZTVkNWFjMjlmOTg2NTMzMzRmMWMzNTgyZWUiLCJpYXQiOjE1MzA3MTUzNTYsIm5iZiI6MTUzMDcxNTM1NiwiZXhwIjoxNTMwNzE1OTU2LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.fB6-basShvtjrauTzOAiYcIYIeJCcrTY4PdSwVlfJH9D5ziZTF1mFhQrC3BlnLg2HAm9QXaFRYhWbO3Txt4su9ndF6IqS-pZ7M5v0JLWPRaQDmVpCWqsiK2ZpjG1P6yyzB9kSPUBE1BUKRyU9xvT8WfjjArh-5q02Ee0gseM39Exq9TDc-54l7o11Megpxl4PqIA8T0o5kVPrCeFz2tIPsPLYf38m554F7txZrylyXmubhqbg3g4AYrcywLDPsNzRz78bShB374_oKQvcBrC5WqfWqJgKencm1jFGGzFTgAdV1kpi44i2hl1ZyLq6r5lhbvApvwk7eebzZBXpkPwzh7mGUcT6WuCuPDsSe0L3-xz8i7USGUTSZSy3MEdRj6aeUs_7gE9Y0Wb-PaqMvGeeRa9Ah7dGK0cA09L0kK7VvxbQKYnVPyjtRjFiBEpFx7m6feho0kZ-dV-yEl8D5Nl6-gLfsgzON4NcgLUGaLuaoLQEx8I2LZ7rzeHI5ggD4IpOdY8IA8tIHocbLUTlxp-NP9Rm9dJjVvVSl0pSi6iX_f7R9XJAXxsadckUscoGIR_yW0XLTJzcb1sKZkSHvbj_WqJabboCqU7xXjeSW75s6xnbFqB0xaRBEysTgDg0iiVV7oWCQlREOZl3DlQrRaACXjvSAwP82WjO2vCt8D7JoY' \
 *
 * @apiSuccessExample Success-Response:
 * HTTP/1.1 200 OK
 * {
 *  "data": [
 *      {
 *          "id": 1,
 *          "name": "Yhensel Benitez",
 *          "email": "yhensel@example.com",
 *          "created_at": "2018-06-06 09:42:50",
 *          "updated_at": "2018-06-06 09:42:50"
 *      },
 *      {
 *          "id": 2,
 *          "name": "Kira Johnston",
 *          "email": "ismael.heller@beahan.org",
 *          "created_at": "2018-06-06 09:42:50",
 *          "updated_at": "2018-06-06 09:42:50"
 *      }
 *  ],
 * "current_page": 1,
 * "first_page_url": "http://users-api.test/users?page=1",
 * "from": 1,
 * "last_page": 2,
 * "last_page_url": "http://users-api.test/users?page=2",
 * "next_page_url": "http://users-api.test/users?page=2",
 * "path": "http://users-api.test/users",
 * "per_page": 9,
 * "prev_page_url": null,
 * "to": 9,
 * "total": 12
 * }
 *
 * @apiErrorExample Error-Response:
 * Error 401: Unauthorized
 * Unauthorized.
 */

/**
 * @apiVersion 0.0.0
 *
 * @api {get} /show/:id/show Show
 * @apiGroup User
 * @apiUse BearerToken
 *
 * @apiSuccess {String} name      User\'s name.
 * @apiSuccess {String} email     User\'s email.
 * @apiSuccess {Date} updated_at  User\'s updated_at date.
 * @apiSuccess {Date} created_at  User\'s created_at date.
 * @apiSuccess {Number} id        User\'s Unique Id.
 *
 * @apiSampleRequest /users/:id/show
 *
 * @apiParamExample {curl} Request-Example:
 * curl -X GET \
 * http://users-api.test/users/1/show
 *   -H 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMyZmE2ZTJiNjdlYzg5YTgyMjY2ZmFmOTE0MzE3YWJhNTFiNzBkNjhlZmJjMGJlMTkzNTBiOGQ0Yzg1ZjkxNmE2OWRhNzRiNWY2ODdkMmQxIn0.eyJhdWQiOiIxIiwianRpIjoiYzJmYTZlMmI2N2VjODlhODIyNjZmYWY5MTQzMTdhYmE1MWI3MGQ2OGVmYmMwYmUxOTM1MGI4ZDRjODVmOTE2YTY5ZGE3NGI1ZjY4N2QyZDEiLCJpYXQiOjE1MzA3MTY0MjksIm5iZiI6MTUzMDcxNjQyOSwiZXhwIjoxNTMwNzE3MDI5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YM2AO3J6pbfSjZKU0CIku_LM4LUGtRGuvet0xJjUrOQvcpZWGC-Ex6UdI-iXXjXdTkG4IqEhVOZgHEKLlzEgfdtW0eqZSEEp9G0-CyX4pqJIjEVhJ9JuTQCNAotn6hhEhtL5jeFtiks-T1pVNuHRmWgCCfStsNjzYhtqoa5-UYyLi5fkoJwOolvry7lu4o2ebR4O0DJV1mMKhTWerfWFDxXk2ska0o4gM7KXr5mu3Nl2UC2QVdK5sJ-Vf_Hwn4-mZ680rGFDwWeFn9L8VYsjzZmHT3kbNGG8DA00gSDgrShwU9rwz5x4vZqXr952FWgnn4zPYbEwqRvT__XqhznKkMz7Me94rPEyMvI_JOYzq8XSAFRywrmAKaNRiW5nGV4FA6LlNs7QuqgqrmG5eeL4JUoXv9b4ONTJ7sKNVvXwiv-mx4JMX9XlWj2ZJVHeogj0aGZtKcxxQShKAj7L5SGEi31AKcAAfZAMC4iC9mQIcSj1omLsXFUfFE6Ft-N4egw3ftIx6vXADz9WRQMoEoRQtSb1cSx6teM-y9g6884DQl969byJHEYlEokmv9jxww12_9QQ8ChnzQDUKqz_hgSIjyo71tzZ4bQ1qqmdoglakQGyTU4YBcN4S5FtnoiJJtg9XRXgKTgO_G9o6gRQ7foG1m1tiN-i5NaZi3vzmk33c7E' \
 *
 * @apiSuccessExample Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "data": {
 *   "name": "Yhensel Benitez",
 *   "email": "yhensel@exam.com",
 *   "updated_at": "2018-07-04 14:25:49",
 *   "created_at": "2018-07-04 14:25:49",
 *   "id": 12
 *  }
 * }
 *
 * @apiErrorExample Error-Response:
 * HTTP/1.1 404 Not Found
 */

/**
 * @apiVersion 0.0.0
 *
 * @api {put} /users/:id/update Update
 * @apiGroup User
 * @apiUse BearerToken
 *
 * @apiParam {String} [name]              User\'s name.
 * @apiParam {String} [email]             User\'s email.
 * @apiParam {String} password            User\'s password.
 * @apiParam {String} [new_password]      User\'s new_password.
 * @apiParam {String} [confirm_password]  User\'s confirm_password required if password.
 *
 * @apiSuccess {String} name      User\'s name.
 * @apiSuccess {String} email     User\'s email.
 * @apiSuccess {Date} updated_at  User\'s updated_at date.
 * @apiSuccess {Date} created_at  User\'s created_at date.
 * @apiSuccess {Number} id        User\'s Unique Id.
 *
 * @apiSampleRequest /users/:id/update
 *
 * @apiParamExample {curl} Request-Example:
 * curl -X POST \
 * curl -X PUT \
 * http://users-api.test/users/1/update \
 * -d 'name=Yhensel%20Benitez&email=yhensel%40example.com&password=secret&new_password=123456&confirm_password=123456'
 *
 * @apiSuccessExample Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "data": {
 *      "id": 1,
 *      "name": "Yhensel Benitez",
 *      "email": "yhensel@example.com",
 *      "created_at": "2018-06-06 09:42:50",
 *      "updated_at": "2018-07-04 15:50:55"
 *  }
 * }
 *
 * @apiErrorExample Error-Response:
 * HTTP/1.1 400 Not Found
 * {
 *  "confirm_password": [
 *      "The confirm password field is required when new password is present."
 *  ]
 * }
 */

/**
 * @apiVersion 0.0.0
 *
 * @api {get} /show/:id/destroy Destroy
 * @apiGroup User
 * @apiUse BearerToken
 *
 * @apiSuccess {String} name      User\'s name.
 * @apiSuccess {String} email     User\'s email.
 * @apiSuccess {Date} updated_at  User\'s updated_at date.
 * @apiSuccess {Date} created_at  User\'s created_at date.
 * @apiSuccess {Number} id        User\'s Unique Id.
 *
 * @apiSampleRequest /users/:id/show
 *
 * @apiParamExample {curl} Request-Example:
 * curl -X GET \
 * http://users-api.test/users/1/show
 *   -H 'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImMyZmE2ZTJiNjdlYzg5YTgyMjY2ZmFmOTE0MzE3YWJhNTFiNzBkNjhlZmJjMGJlMTkzNTBiOGQ0Yzg1ZjkxNmE2OWRhNzRiNWY2ODdkMmQxIn0.eyJhdWQiOiIxIiwianRpIjoiYzJmYTZlMmI2N2VjODlhODIyNjZmYWY5MTQzMTdhYmE1MWI3MGQ2OGVmYmMwYmUxOTM1MGI4ZDRjODVmOTE2YTY5ZGE3NGI1ZjY4N2QyZDEiLCJpYXQiOjE1MzA3MTY0MjksIm5iZiI6MTUzMDcxNjQyOSwiZXhwIjoxNTMwNzE3MDI5LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.YM2AO3J6pbfSjZKU0CIku_LM4LUGtRGuvet0xJjUrOQvcpZWGC-Ex6UdI-iXXjXdTkG4IqEhVOZgHEKLlzEgfdtW0eqZSEEp9G0-CyX4pqJIjEVhJ9JuTQCNAotn6hhEhtL5jeFtiks-T1pVNuHRmWgCCfStsNjzYhtqoa5-UYyLi5fkoJwOolvry7lu4o2ebR4O0DJV1mMKhTWerfWFDxXk2ska0o4gM7KXr5mu3Nl2UC2QVdK5sJ-Vf_Hwn4-mZ680rGFDwWeFn9L8VYsjzZmHT3kbNGG8DA00gSDgrShwU9rwz5x4vZqXr952FWgnn4zPYbEwqRvT__XqhznKkMz7Me94rPEyMvI_JOYzq8XSAFRywrmAKaNRiW5nGV4FA6LlNs7QuqgqrmG5eeL4JUoXv9b4ONTJ7sKNVvXwiv-mx4JMX9XlWj2ZJVHeogj0aGZtKcxxQShKAj7L5SGEi31AKcAAfZAMC4iC9mQIcSj1omLsXFUfFE6Ft-N4egw3ftIx6vXADz9WRQMoEoRQtSb1cSx6teM-y9g6884DQl969byJHEYlEokmv9jxww12_9QQ8ChnzQDUKqz_hgSIjyo71tzZ4bQ1qqmdoglakQGyTU4YBcN4S5FtnoiJJtg9XRXgKTgO_G9o6gRQ7foG1m1tiN-i5NaZi3vzmk33c7E' \
 *
 * @apiSuccessExample Success-Response:
 * HTTP/1.1 200 OK
 * {
 * "data": {
 *      "id": 1,
 *      "name": "Yhensel Benitez",
 *      "email": "yhensel@example.com",
 *      "created_at": "2018-07-04 15:55:16",
 *      "updated_at": "2018-07-04 15:55:16"
 *  }
 * }
 *
 * @apiErrorExample Error-Response:
 * HTTP/1.1 404 Not Found
 */
