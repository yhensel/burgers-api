<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param \Illuminate\Contracts\Auth\Factory $auth
     *
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * @apiVersion 0.0.0
     *
     * @api {post} /oauth/token Login
     * @apiGroup User
     *
     * @apiParam {String}           grant_type          Users User authentication type.
     * @apiParam {String}    client_secret       Authentication type.
     * @apiParam {Number}           client_id Client    (application auth id) unique ID.
     * @apiParam {String}         username User       email.
     * @apiParam {String}         password User       password.
     *
     * @apiSuccess {String} token_type      Always Bearer.
     * @apiSuccess {Number} expires_in      Time in seconds that the token remains valid.
     * @apiSuccess {String} access_token    Access Token.
     * @apiSuccess {String} refresh_token   Refresh Token.
     *
     * @apiSampleRequest /oauth/token
     *
     * @apiParamExample {curl} Request-Example:
     * curl -X POST \
     * http://users-api.test/oauth/token \
     * -H 'Cache-Control: no-cache' \
     * -H 'Content-Type: application/x-www-form-urlencoded' \
     * -H 'Postman-Token: de933150-501d-40ff-8868-2c2dd38ba33d' \
     * -d 'grant_type=password&client_i=1&client_secret=secret&username=yhensel%40example.com&password=secret'
     *
     * @apiSuccessExample Success-Response:
     * HTTP/1.1 200 OK
     * {
     *  "token_type": "Bearer",
     *  "expires_in": 599,
     *  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjNkM2M0MWU3M2UzM2Q3YzlkMmFlNzQ5ZjZkNzlmOGM4MDJjOTRjNjc2YTcyMDFjY2QzMzczMTYxMDQ1MzY5M2ZiMTA5MjBkOGQzMzMwNmU2In0.eyJhdWQiOiIxIiwianRpIjoiM2QzYzQxZTczZTMzZDdjOWQyYWU3NDlmNmQ3OWY4YzgwMmM5NGM2NzZhNzIwMWNjZDMzNzMxNjEwNDUzNjkzZmIxMDkyMGQ4ZDMzMzA2ZTYiLCJpYXQiOjE1MzA3MTE5MDYsIm5iZiI6MTUzMDcxMTkwNiwiZXhwIjoxNTMwNzEyNTA1LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.UkfustDt5Y_Y9qlm6wkswOgOqjAcB5YGsQtdasOfsViEYdqpmD65SrtDAYxmx3lOMHdiuGzm7FYHHfTn-4nyjFZDe5kqCMc_oEE0plN8NLwkuWJeYh_hxZPtylZTXsCGL3ReGTOVZL8i-rmdLUq0Vu-Df7efxv5Di1YhV_kaFZapPpvRjTNFmkATLww3Zn6bdJ5TVBvFuGBl00-AqX5W9IfqrNS_U-mYElzoZ1wZ79h8TCP5yzYqwfRuRCa3Jwt3cn66Qw5U1znmET7rAN3QHmAKxa-YV-Rj4aOGVtRY7x_VZUWUxQwjED_ZOSXn_6KVQUWDVuII40VF7Av9JhrX30Hyrkht2sXhBYu7Rxntgp5jQpPk6aFeT-fai-JKFNJKcz6HSPr0vJgU1q6VaL55oUvgsL2NK_4oqr5ewXcW3PsNigxjAw05VnjCYFTz71HZGZarC9aRkZfWGrwdq04neTfp4gJYwuJAunLe6sAT6YH1OMpfaVc37z9hMCWvXUo7RoSzDSue19dR_3JMgVZdYbLbh6P_GPsWcTb5dlHTQW9aH_cz3ou26f87lXjS5X_ty0bC3byrtI46rMJJZ_vkCqzFj6y76yrV-87b17Epv3FGqjsubKOV7ix-81nrbhNNfIaN_TVtUK9z2CtS2qNGY0nmH_RruWNRdfb8yPD9ALA",
     *  "refresh_token": "def502007f10707bae68cec904f6d5e4fe94600b8eb6161af3a9211570dbbc56f52a5608109bb4fb2145417d4efe0b29cdfc718132b48c0b162da3dbc8164e3c7cc3a4904ab8718b01fef672361fe1685fc3d324e696cfd62b430c89f3e97e502e2c868986325b92eda9ab66d0f1a6705efad6bfe7f2dfdb9a3080f80fd8a4c83998c01d186ec9bc1cf0c226c1946fade94d841e6e5525fe46c0ab8cf634fac85e90e5df20de7ce95c48e0a14ba12c7839671cfbd3561525755a54a6edff1728b7a86d61b5f72f404c3f08d6a55f548d3cf8bbd5a1e88890d2e458e2039187c05d294cf3343509d108ad1b67af6176da25989d180ed2a0e066c3a7ba41c1281038608f6e369af44eb9f2b201a15adc160519e18479cd1f01ffbf264b1ca52563b4cedeb78b18271b013fd848e45fc6b6af049f9006c1ae5005e3da90923d301fdf965356c14c0f2d339fc89202240fd6ea823164537215ac684413208112e0e3e1"
     * }
     *
     * @apiErrorExample Error-Response:
     * HTTP/1.1 400 Not Found
     * {
     *  "error": "invalid_request",
     *  "message": "The request is missing a required parameter, includes an invalid parameter value, includes a parameter more than once, or is otherwise malformed.",
     *  "hint": "Check the `client_id` parameter"
     * }
     */

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     * @param string|null              $guard
     *
     * @return mixed
     **/
    public function handle($request, Closure $next, $guard = null)
    {
        if ($this->auth->guard($guard)->guest()) {
            return response('Unauthorized.', 401);
        }

        return $next($request);
    }
}
