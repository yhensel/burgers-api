<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\RequestValidators\UserRequestValidator;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        dd('here');
    }

    public function show($id)
    {
        //
    }

    /**
     * @param Request $request
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        dd('here');
        (new UserRequestValidator($request, 'create'));

        $user = $this->repository->create($request);

        return $user->save() ? $this->success($user, 200) : $this->error('cant create the user', '400');
    }

    /**
     * @param Request $request
     * @param User    $userId
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $userId)
    {
        (new UserRequestValidator($request, 'update'));

        $user = User::find($userId);

        if (Hash::check($request->input('password'), $user->password)) {
            $user = $this->repository->update($request, $user);

            return $user->save() ? $this->success($user, 200) : $this->error('cant create the user', '400');
        } else {
            return $this->error('cant update the user: wrong password', '400');
        }
    }

    public function destroy($id)
    {
        //
    }
}
