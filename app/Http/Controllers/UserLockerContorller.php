<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;

class UserLockerContorller extends Controller
{
    public function lockerpage($location,$lockerid){

        $datalocker = $this->getLocker($lockerid);


        return view('page.userlocker', compact('datalocker', 'location'));
    }

    public function getLocker($lockerid){
        $locker = Locker::where('locker_id', '=', $lockerid)->get();

        return $locker;
    }
}
