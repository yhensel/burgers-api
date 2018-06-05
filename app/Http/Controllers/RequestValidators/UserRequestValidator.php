<?php

namespace App\Http\RequestValidators;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserRequestValidator extends Controller
{
    /**
     * @param Request $request
     * @param string  $requestMethod validation method
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function __construct(Request $request, $requestMethod)
    {
        if ($requestMethod == 'create') {
            $this->doPostValidation($request);
        }
    }

    /**
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function doPostValidation(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|max:125',
            'email'    => 'required|email',
            'password' => 'required',
        ]);
    }
}
