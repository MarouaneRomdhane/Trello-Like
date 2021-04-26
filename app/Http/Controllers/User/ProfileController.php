<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function sendProfile(Request $request)
    {
        $id = auth()->id();
        $profile = User::find($id);

        $request->validate(
            [
                'name' => 'nullable|string|min:2',
                'firstname' => 'nullable|string|alpha|min:2',
                'lastname' => 'nullable|string|alpha',
                'email' => 'nullable|email|max:60',
                'password' => 'nullable|min:6|confirmed',
                'avatar' => 'nullable|mimes:jpg,jpeg,png',
            ]
        );

        $avatar = $request->avatar;
        if ($avatar !== null && $profile->$avatar !== 1) {
            if (($avatarPath = $avatar->store('public/assets/uploads'))) {
                $profile->avatar = $avatarPath;
                $avatarPath = explode('/', $avatarPath);
                $marou = array_pop($avatarPath);
                $profile->avatar = $marou;
            } else {
                $profile->avatar = '';
            }
        }

        if ($request->name) {
            $profile->name = $request->name;
        }
        if ($request->firstname) {
            $profile->firstname = $request->firstname;
        }
        if ($request->email) {
            $profile->email = $request->email;
        }
        if ($request->password) {
            $profile->password = Hash::make($request->password);
        }

        $profile->save();

        // return response()->json(['user_updated' => true], 201);

        // dd($user);
        // dd($profile);

        // $profile = new User();
        // $profile->name = $request->name;
        // $profile->firstname = $request->firstname;
        // $profile->lastname = $request->lastname;
        // $profile->email = $request->email;
        // $profile->password = $request->password;
        // $profile->save();

        return view('welcome');
    }
}
