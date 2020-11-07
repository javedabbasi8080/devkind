<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\Register;
use App\Http\Requests\ProfileUpdate;
use Auth;

class AuthController extends Controller
{
    //


    public function register(Register $request)
    {
         return $request->process();
    }

    public function profile()
    {
        $data['profile'] = Auth::user();
        return view('profile',$data);
    }

    public function updateProfile(ProfileUpdate $request)
    {
        return $request->process();
    }
}
