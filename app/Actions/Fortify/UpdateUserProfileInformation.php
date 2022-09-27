<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use DB,Auth;
class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        if(empty($input['username'])){
            $username1 = Auth::user()->username;
        }else{
            $username1 = $input['username'];
        }
        $unregistered_names = DB::table("settings")->where('settings_unregistered_names', 'LIKE', "%$username1%")->first();
        if($unregistered_names == null){
            $user_info = DB::table("users")->where('username',"$username1")->first();
            if($user_info == null || $user_info->username == Auth::user()->username){
                Validator::make($input, [
                    // 'username' => ['required', 'string','min:5' , 'max:100', 'unique:users' ,
                    // 'regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/'],
                    'username' => ['required', 'string','min:5' , 'max:100',
                    'regex:/^[A-Za-z0-9]+(?:[_-][A-Za-z0-9]+)*$/'],
                    'name' => ['nullable', 'string', 'max:255'],
                    'family' => ['nullable', 'string', 'max:255'],
                    'bio' => ['nullable', 'string', 'max:1255'],
                    'job' => ['nullable', 'string', 'max:255'],
                    'url' => ['nullable', 'string', 'max:255'],
                    'domain' => ['nullable', 'string', 'max:255'],
                    'mobile' => ['nullable', 'string', 'max:255'],
                    'tronwallet' => ['nullable', 'string', 'max:1255'],
                    'email' => ['nullable', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
                    'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:1024'],
                    'youtube' => ['nullable', 'string', 'max:9999'],
                    'instagram' => ['nullable', 'string', 'max:9999'],
                    'facebook' => ['nullable', 'string', 'max:9999'],
                    'telegram' => ['nullable', 'string', 'max:9999'],
                    'whatsapp' => ['nullable', 'string', 'max:9999'],
                    'twitter' => ['nullable', 'string', 'max:9999'],
                    'linkedin' => ['nullable', 'string', 'max:9999'],
                    'tiktok' => ['nullable', 'string', 'max:9999'],
                    'skype' => ['nullable', 'string', 'max:9999'],
                    'github' => ['nullable', 'string', 'max:9999'],
                    'pinterest' => ['nullable', 'string', 'max:9999'],
                    'reddit' => ['nullable', 'string', 'max:9999'],
                    'twitch' => ['nullable', 'string', 'max:9999'],
                    'wechat' => ['nullable', 'string', 'max:9999'],
                    'kuaishou' => ['nullable', 'string', 'max:9999'],
                    'qzone' => ['nullable', 'string', 'max:9999'],
                    'quora' => ['nullable', 'string', 'max:9999'],
                    'wikipedia' => ['nullable', 'string', 'max:9999'],
                    'language' => ['nullable', 'string', 'max:20']
                    

                ])->validateWithBag('updateProfileInformation');
        
                if (isset($input['photo'])) {
                    $user->updateProfilePhoto($input['photo']);
                }
        
                // if ($input['username'] !== $user->username &&
                //     $user instanceof MustVerifyEmail) {
                //     $this->updateVerifiedUser($user, $input);
                // } 
                else {
                    $user->forceFill([
                        'language' => $input['language'],
                        'username' => $input['username'],
                        'family' => $input['family'],
                        'bio' => $input['bio'],
                        'job' => $input['job'],
                        'url' => $input['url'],
                        'domain' => $input['domain'],
                        'mobile' => $input['mobile'],
                        'tronwallet' => $input['tronwallet'],
                        'name' => $input['name'],
                        'email' => $input['email'],
                        'youtube' => $input['youtube'],
                        'instagram' => $input['instagram'],
                        'facebook' => $input['facebook'],
                        'telegram' => $input['telegram'],
                        'whatsapp' => $input['whatsapp'],
                        'twitter' => $input['twitter'],
                        'linkedin' => $input['linkedin'],
                        'tiktok' => $input['tiktok'],
                        'skype' => $input['skype'],
                        'github' => $input['github'],
                        'pinterest' => $input['pinterest'],
                        'reddit' => $input['reddit'],
                        'twitch' => $input['twitch'],
                        'wechat' => $input['wechat'],
                        'kuaishou' => $input['kuaishou'],
                        'qzone' => $input['qzone'],
                        'quora' => $input['quora'],
                        'wikipedia' => $input['wikipedia'],
                    ])->save();
                }
            }else{
             return redirect()->back()->with('message', 'This username is taken !');
            } 
        }else{
            return redirect()->back()->with('message', 'This account is a brand, if you own it, contact us to receive it.');
        }




      


       
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'username' => $input['username'],
            'family' => $input['family'],
            'bio' => $input['bio'],
            'job' => $input['job'],
            'url' => $input['url'],
            'domain' => $input['domain'],
            'mobile' => $input['mobile'],
            'tronwallet' => $input['tronwallet'],
            'name' => $input['name'],
            'email' => $input['email'],
            'email_verified_at' => null,
            'youtube' => $input['youtube'],
            'instagram' => $input['instagram'],
            'facebook' => $input['facebook'],
            'telegram' => $input['telegram'],
            'whatsapp' => $input['whatsapp'],
            'twitter' => $input['twitter'],
            'linkedin' => $input['linkedin'],
            'tiktok' => $input['tiktok'],
            'skype' => $input['skype'],
            'github' => $input['github'],
            'pinterest' => $input['pinterest'],
            'reddit' => $input['reddit'],
            'twitch' => $input['twitch'],
            'wechat' => $input['wechat'],
            'kuaishou' => $input['kuaishou'],
            'qzone' => $input['qzone'],
            'quora' => $input['quora'],
            'wikipedia' => $input['wikipedia'],
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
