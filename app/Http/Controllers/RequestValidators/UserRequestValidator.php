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
    public function doValidation(Request $request, $requestMethod)
    {
        if ($requestMethod == 'create') {
            $this->doPostValidation($request);
        }

        if ($requestMethod == 'update') {
            $this->doPutValidation($request);
        }

        if ($requestMethod == 'delete') {
            $this->doDeleteValidation($request);
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
            'name'             => 'required|max:125',
            'email'            => 'required|email',
            'password'         => 'required',
            'confirm_password' => 'required|same:password',
        ]);
    }

    /**
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function doPutValidation(Request $request)
    {
        $this->validate($request, [
            'name'             => 'max:125',
            'password'         => 'required',
            'new_password'     => 'sometimes',
            'confirm_password' => 'required_with:new_password',
        ]);
    }

    /**
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    private function doDeleteValidation(Request $request)
    {
        $this->validate($request, [
            'password'         => 'required',
        ]);
    }
}
