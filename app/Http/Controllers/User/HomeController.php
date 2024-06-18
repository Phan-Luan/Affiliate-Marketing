<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Config;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
//        dd(1);
        $khotien = Config::where('key','khotien')->first();
        return view('user.home.index')->with(compact('khotien'));
    }
    public function active() {
//        dd(1);
        // $khotien = Config::where('key','khotien')->first();
        return view('user.home.activeuser');
    }
}
