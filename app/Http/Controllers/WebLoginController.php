<?php

namespace App\Http\Controllers;

use Elliptic\EC;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use kornrunner\Keccak;
use App\Models\User;
use Helper,Auth,Socialite;

class WebLoginController
{
    public function metamaskethmessage(): string
    {
        $nonce = Str::random();
        $message = "Sign this message to confirm you own this wallet address. This action will not cost any gas fees.\n\nNonce: " . $nonce;

        session()->put('sign_message', $message);

        return $message;
    }

    public function metamaskethverify(Request $request): string
    {
        $result = $this->verifySignature(session()->pull('sign_message'), $request->input('signature'), $request->input('address'));
        // If $result is true, perform additional logic like logging the user in, or by creating an account if one doesn't exist based on the Ethereum address
       
        return ($result ? 'OK' : 'ERROR');
    }
    public function metamaskethregister($address)
    {
        $email = uniqid().'@last.today';
        
        $newUser = User::create([
            'metamask_login_wallet' => $address,
            'email' => $email,
            'password' => encrypt(uniqid()),
            'username' => Helper::gen_uuid($len=8),
            'profile_photo_url' => Helper::make_avatar($email),
             'pv' => 0,
             'first_register_ip' => Helper::get_client_ip(),
        ]);

        Auth::login($newUser);

        return redirect('/user/dashboard');
    }

    protected function verifySignature(string $message, string $signature, string $address): bool
    {
        $hash = Keccak::hash(sprintf("\x19Ethereum Signed Message:\n%s%s", strlen($message), $message), 256);
        $sign = [
            'r' => substr($signature, 2, 64),
            's' => substr($signature, 66, 64),
        ];
        $recid = ord(hex2bin(substr($signature, 130, 2))) - 27;

        if ($recid != ($recid & 1)) {
            return false;
        }

        $pubkey = (new EC('secp256k1'))->recoverPubKey($hash, $sign, $recid);
        $derived_address = '0x' . substr(Keccak::hash(substr(hex2bin($pubkey->encode('hex')), 1), 256), 24);

        return (Str::lower($address) === $derived_address);
    }
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
        
    }
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('google')->user();
      
            $finduser = User::where('social_id', $user->id)->orwhere('email',$user->email)->first();
      
            if($finduser){
                Auth::login($finduser);
                return redirect('/user/dashboard');
            }else{

                
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_id'=> $user->id,
                    'social_type'=> 'google',
                    'password' => encrypt(uniqid()),
                    'username' => Helper::gen_uuid($len=8),
                    'profile_photo_url' => Helper::make_avatar($user->email),
                    'pv' => 0,
                   'first_register_ip' => Helper::get_client_ip(),
                ]);
     
                Auth::login($newUser);
      
                return redirect('/user/dashboard');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}