<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Laravel\Lumen\Auth\Authorizable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Builder;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Check the password passed in plain text.
     *
     * @param $passwordToCheck
     *
     * @return bool true if correct
     */
    public function checkPassword($passwordToCheck)
    {
        if (Hash::check($passwordToCheck, $this->password)) {
            return true;
        }

        return false;
    }

    /***
     * Search by name and email
     *
     * @param Builder $query
     * @param string $value
     *
     * @return Builder
     */
    public function scopeSearch(Builder $query, string $value)
    {
        $like = '%'.$value.'%';

        return $query
            ->where('name', 'like', $like)
            ->orWhere('email', 'like', $like);
    }
}
