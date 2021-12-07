<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Profile extends Controller
{
    //Return the user profile view
    public function __invoke()
    {
        return view('user.profile');
    }
}
