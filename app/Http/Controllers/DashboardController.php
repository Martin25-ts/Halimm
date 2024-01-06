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

    public function getAllUserTransaction(Request $request){
        $token = $request->api_token;
        $user = User::where('api_token', $token)->first();

        if (!$user) {
            return response()->json(['error' => 'Invalid API token'], 401);
        }

        try {
            $transaction = Transaction::where('user_id', $user->user_id)
            ->whereIn('status_transaction_id', [1,2])
            ->join('transaction_details', 'transactions.transaction_id', '=', 'transaction_details.transaction_id')
            ->join('ms_lockers', 'transaction_details.locker_id', '=', 'ms_lockers.locker_id')
            ->get();
        } catch (QueryException $e) {
            return response()->json([
                "error" => "Gagal Mendapatkan ListLocker"
            ],500);
        }

        return response()->json([
            $transaction
        ],201);


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
