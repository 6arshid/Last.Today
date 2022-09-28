<?php

  

namespace App\Providers;

  

use App\Actions\Fortify\CreateNewUser;

use App\Actions\Fortify\ResetUserPassword;

use App\Actions\Fortify\UpdateUserPassword;

use App\Actions\Fortify\UpdateUserProfileInformation;

use Illuminate\Support\ServiceProvider;

use Laravel\Fortify\Fortify;

use Laravel\Fortify\Http\Requests\LoginRequest;

use App\Models\User;

use Hash;

  

class FortifyServiceProvider extends ServiceProvider

{

    /**

     * Register any application services.

     *

     * @return void

     */

    public function register()

    {

          

    }

    /**

     * Bootstrap any application services.

     *

     * @return void

     */

    public function boot()

    {

        Fortify::createUsersUsing(CreateNewUser::class);

        Fortify::updateUserProfileInformationUsing(UpdateUserProfileInformation::class);

        Fortify::updateUserPasswordsUsing(UpdateUserPassword::class);

        Fortify::resetUserPasswordsUsing(ResetUserPassword::class);

  

        Fortify::authenticateUsing(function (LoginRequest $request) {

            $user = User::where('email', $request->identity)

                ->orWhere('username', $request->identity)->first();

  

            if (

                $user &&

                Hash::check($request->password, $user->password)

            ) {

                return $user;

            }

        });

    }

}