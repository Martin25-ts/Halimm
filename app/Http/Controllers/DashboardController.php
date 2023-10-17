<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Locker;
use Illuminate\Database\Eloquent\Collection\toSql;
use Illuminate\Http\Request;



class DashboardController extends Controller
{
    public function dashboard($location = NULL)
    {

        $datalocker = $this->getAllLockersByLocation($location);

        if (is_null($location)) {
            return view('page.dashboard', compact('datalocker','location'));
        } else {
            return view('page.dashboard', compact('datalocker', 'location'));
        }

    }



    public function getAllLockersByLocation($location)
    {

        // DB::enableQueryLog();

        $lockers = Locker::join('ms_locations', 'ms_lockers.location_id', '=', 'ms_locations.location_id')
        ->where('ms_locations.location_url', '=', $location)
        ->get();

        // $query = DB::getQueryLog();
        // $lastQuery = end($query)['query'];

        // dd($lastQuery,$location);


        return $lockers;
    }

    public function getAllLocker(){
        $lockers = Locker::all();

        return $lockers;
    }
}
