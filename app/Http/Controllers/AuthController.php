<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Nexmo\Laravel\Facade\Nexmo;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function rForm(){
        return view('register');
    }

    public function lForm(){
        return view('login');
    }
    
    public function register(Request $request){
        $request->validate([
            'name' => 'required|string',
            'gender' => 'required|string',
            'password' => 'required|string',
            'email' => 'required|email'
        ]);

        $token = Str::random(24);

        $user = User::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => $token
        ]);

        Mail::send('verification-email', ['user'=>$user], function($mail) use ($user){
            $mail->to($user->email);
            $mail->subject('Account Verification');
            $mail->from('bagsolingmarydaileen20@gmail.com', 'IPT Midterm ');
        });


        return redirect('/login')->with('Message', 'Account created, Please check your gmail for verification');
    }

    public function login(Request $request){
        $request->validate([
            'email' => 'email|required',
            'password' => 'string|required',
        ]);

        $user = User::where('email', $request->email)->first();

        if(!$user || $user->email_verified_at==null){
            return redirect('/login')->with('Error', 'Account not yet verified');
        }

        $login = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ]);

        if(!$login) {
            return back()->with('Error', 'Invalid credentials');
        };

        return redirect('/dashboard');
    }

    public function verification(User $user, $token){
        if($user->remember_token!==$token) {
            return redirect('/login')->with('Error', 'The token is invalid.');
        }

        $user->email_verified_at = now();
        $user->save();

        return redirect('/login')->with('Message', 'Your account has been verified. You may now login.');
    }

    public function logout(Request $request){
        auth()->logout();
        return redirect('/')->with('Message', 'Successfully Logout');
    }
}