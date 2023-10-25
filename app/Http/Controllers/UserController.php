<?php
// app/Http/Controllers/UserController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserRegistered;

class UserController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6',
        ]);

        $user = User::updateOrCreate(
            ['email' => $request->email],
            ['name' => $request->name, 'password' => Hash::make($request->password)]
        );
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        $user->save();

        Mail::to($user->email)->send(new UserRegistered($user));

        return view('emails/userregistered', [
            'name' => $user->name,
            'email' => $user->email
        ])->with('success', 'Registrasi berhasil! Silahkan login untuk melanjutkan.');
    
        }
}
