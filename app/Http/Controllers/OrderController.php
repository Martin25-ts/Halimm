<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Locker;
use App\Models\Location;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\TransactionDetail;
use Illuminate\Database\QueryException;

class OrderController extends Controller
{
    public function order($location = NULL){

        if (is_null($location)) {
            return redirect()->route('dashboard')->with('error', 'Anda Perlu Scan Barcode Pada Lockers');
        } else {
            $max = $this->getMaxOrder($location);
            if($max >= 1){

                return view('page.order', compact('location', 'max'));
            }else{
                return redirect()->route('dashboard', ['location' => $location])->with('info', 'Sekarang Locker Sudah Terisi Penuh');
            }
        }
    }

    public function orderMobile(Request $request){
        $token = $request->api_token;
        $user = User::where("api_token", $token)->first();

        if (empty($user) || $token == null) {
            return response()->json(["error" => "Gagal Mendapatkan List Locker"], 401);
        }

        $params = [
            'user' => $user,
            'qty' => $request->qty,
            'duration' => $request->duration,
            'location' => $request->location,
        ];

        $max = $this->getMaxOrder($params['location']);


        if($max == 0 || $max < $params['qty'] ){
            return response()->json([
                "error" => "Gagal Membuat TransaksiS"
            ],404);
        }else{



            $data = $this->getLocker($params['location'], $params['qty']);

            foreach ($data as $dto) {
                $dto->status_locker_id = 1;
                $dto->save();
            }
            $now = Carbon::now('Asia/Jakarta')->format('Y-m-d H:i:s');

            try {
                $transaction = Transaction::create([
                    'transaction_date' => $now,
                    'user_id' => $params['user']->user_id,
                    'status_transaction_id' => 1,
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);



                foreach ($data as $dto) {
                    TransactionDetail::create([
                        'transaction_id' => $transaction->transaction_id,
                        'duration' => $params['duration'],
                        'locker_id' => $dto->locker_id,
                        'created_at' => $now,
                        'updated_at' => $now,
                    ]);
                }



                return response()->json(['message' => 'Transaction created successfully', "Transaction" => $transaction],200);

            } catch (QueryException $e) {

                return response()->json(['error' => $e->getMessage()], 500);
            }
        }

    }

    public function startPayment(Request $request, $location){


        $qty = $request->lockerqty;
        $listlocker = $this->getLocker($location, $qty);

        if (is_null($listlocker) || count($listlocker) + 1 < $qty) {
            return redirect()->route('order-location', ['location' => $location])->with('warning', 'Maaf Jumlah Locker Melebihi Ketersediaan Locker');
        }




        return view('page.payment', compact('location', 'listlocker'));

    }


    public function getMaxOrder($location){

        $available = Locker::join('ms_locations', 'ms_lockers.location_id', '=', 'ms_locations.location_id')
                    ->where('ms_lockers.status_locker_id', 2)
                    ->where('ms_locations.location_url', $location)
                    ->count();
        return (int) $available;
    }

    private function getLocationId($location){
        return Location::where('location_url', $location)->first();
    }

    public function getLocker($location, $qty){

        $id = $this->getLocationId($location, $qty);
        $lockerorder = Locker::where('location_id', $id->location_id)
        ->where('status_locker_id', 2)
        ->take($qty)
        ->get();


        return $lockerorder;
    }

    // MOBILE CONTROLLER
    public function getUserLocker(Request $request){

        $api_token = $request->api_token;
        $user = User::where("api_token", $api_token)->first();

        if (empty($user) || $api_token == null) {
            return response()->json(["message" => "Gagal Mendapatkan List Locker"], 401);
        }

        try{
            $data = Transaction::select(
                'transactions.transaction_id',
                'transactions.transaction_date',
                'transactions.user_id',
                'transactions.status_transaction_id',
                'transaction_details.detial_id',
                'transaction_details.duration',
                'transaction_details.locker_id',
                'ms_lockers.locker_number',
                'ms_lockers.locker_size',
                'ms_lockers.status_door',
                'ms_locations.location_name',
                'ms_locations.location_url',
            )
            ->join('transaction_details', 'transactions.transaction_id', '=', 'transaction_details.transaction_id')
            ->join('ms_lockers', 'transaction_details.locker_id', '=', 'ms_lockers.locker_id')
            ->join('ms_locations','ms_lockers.location_id', '=', 'ms_locations.location_id' )
            ->whereIn('transactions.status_transaction_id', [1, 2])
            ->where('transactions.user_id', $user->user_id)
            ->get();

            return response()->json(['message' => "Berhasil Mendapatkan List Locker", 'transaction' => $data], 200);
        }catch(QueryException $e){
            return response()->json([
                "error" => "Gagal Mendapatkan List Locker"
            ],500);
        }

    }

}
