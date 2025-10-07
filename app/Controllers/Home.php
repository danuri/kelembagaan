<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        if (auth()->loggedIn()) {
            return view('user/index');
        }else{
            return view('welcome_message');
        }
    }
}
