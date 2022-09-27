<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Helper,Session;

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
        $validator = Validator::make($input, [
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'language' => ['required', 'string','max:255'],
            // 'referrer' => ['nullable', 'string', 'max:255'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();
        // $errors = $validator->errors();
        // foreach ($errors->all() as $message) {
        // return redirect()->back()->with('message', "$message");
        // die();
        //  }

     


        return User::create([
            'ref' => Session::get('ref'),
            // 'name' => $input['name'],
            'language' => $input['language'],
            'profile_photo_url' => Helper::make_avatar($input['username']),
            'username' => $input['username'],
            'password' => Hash::make($input['password']),
        ]);
    }
}
