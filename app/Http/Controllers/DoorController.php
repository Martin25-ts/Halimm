<?php

namespace App\Http\Controllers;

use App\Models\Locker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DoorController extends Controller
{


    public function setLock(Request $request, $location, $lockerid)
    {
        $locker = Locker::find($lockerid);


        $locker->status_door = true;
        $locker->save();


        return Redirect::route('locker.page', ['location' => $location, 'lockerid' => $lockerid]);
    }

    public function setUnlock(Request $request, $location, $lockerid,)
    {
        $locker = Locker::find($lockerid);

        $locker->status_door = false;
        $locker->save();


        return Redirect::route('locker.page', ['location' => $location, 'lockerid' => $lockerid]);
    }
}
