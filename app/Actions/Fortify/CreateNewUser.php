<?php

namespace App\Actions\Fortify;

use App\Models\Role;
use App\Models\User;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],

        ])->validate();



        if (isset($input['image']) && $input['image'] instanceof \Illuminate\Http\UploadedFile) {
            $filename = uniqid() . '.' . $input['image']->getClientOriginalExtension();
            $input['image']->move(public_path('uploads/user'), $filename);
            $imgPath = 'uploads/user/' . $filename;
        } else {
            $imgPath = 'uploads/user/default.jpg';
        }
       








    $userRole = Role::where('name', 'user')->first();
        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role_id' =>$userRole->id,
            'image' => $imgPath,
        ]);

    }
}
