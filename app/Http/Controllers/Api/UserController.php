<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\RequestValidators\UserRequestValidator;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $repository;

    /**
     * @var UserRequestValidator
     */
    protected $validator;

    public function __construct(UserRepository $repository, UserRequestValidator $validator)
    {
        $this->repository = $repository;
        $this->validator = $validator;
    }

    public function index(Request $request)
    {
        if ($request->has('search')) {
            return User::search($request->input('search'))->paginate(9);
        }

        return User::paginate(9);
    }

    public function show($userId)
    {
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
        $this->validator->doValidation($request, 'create');

        $user = $this->repository->create($request);

        return $user->save() ? $this->success($user, 201) : $this->error('Can\'t create the user', '400');
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
        $this->validator->doValidation($request, 'update');

        $user = User::find($userId);

        if ($user->checkPassword($request->input('password'))) {
            $user = $this->repository->update($request, $user);

            return $user->save() ? $this->success($user, 200) : $this->error('Can\'t create the user', '400');
        }

        return $this->error('Can\'t update the user: wrong password', 403);
    }

    /**
     * @param Request $request
     * @param $userId
     *
     * @throws \Illuminate\Validation\ValidationException
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Request $request, $userId)
    {
        $this->validator->doValidation($request, 'delete');

        $user = User::find($userId);

        if ($user->checkPassword($request->input('password'))) {
            DB::transaction(function () use ($user) {
                $user->delete();
            });

            return $this->success($user, 200);
        }

        return $this->error('Credentials are incorrect', 401);
    }
}
