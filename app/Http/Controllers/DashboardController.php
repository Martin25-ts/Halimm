<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Locker;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection\toSql;



class DashboardController extends Controller
{
    public function dashboard($location = NULL)
    {


            $usertransactions = $this->getAllUserTransaction(Auth::user()->user_id);
            // $datalocker = $this->getAllLockersByLocation($location);
            return view('page.dashboard', compact('usertransactions', 'location'));

    }


    public function getAllUserTransaction($user_id){
        $data = null;
    }

    public function getAllLockersByLocation($location)
    {

        $lockers = Locker::join('ms_locations', 'ms_lockers.location_id', '=', 'ms_locations.location_id')
        ->where('ms_locations.location_url', '=', $location)
        ->get();

        return $lockers;
    }

    public function getAllLocker(){
        $lockers = Locker::all();

        return $lockers;
    }
}
