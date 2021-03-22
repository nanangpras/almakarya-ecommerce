<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique(User::class),
            ],
            'password' => $this->passwordRules(),
            'address' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'province_id' => ['required', 'integer'],
            'city_id' => ['required', 'integer'],
            'postcode' => ['required', 'integer'],
            'subdistrict_id' => ['required', 'integer'],
        ])->validate();

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'address' => $input['address'],
            'phone' => $input['phone'],
            'province_id' => $input['province_id'],
            'city_id' => $input['city_id'],
            'subdistrict_id' => $input['subdistrict_id'],
            'postcode' => $input['postcode'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
