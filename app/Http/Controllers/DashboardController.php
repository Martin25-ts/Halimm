<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard($location = NULL){
        if (is_null($location)) {
            return view('page.dashboard', ['location' => $location]);
        } else {
            return view('page.dashboard', ['location' => $location]);
        }
    }
}
