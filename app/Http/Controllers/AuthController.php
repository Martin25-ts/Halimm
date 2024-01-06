<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class AuthController extends Controller
{
    public function prelogin(){
        return view('page.prelog');
    }


    public function login(){
        return view('page.login');
    }

    public function regis(){
        return view('page.register');
    }


    public function authLog(Request $request){

        $loginField = filter_var($request->input('username'), FILTER_VALIDATE_EMAIL) ? 'email' : 'user_phone';

        $credentials = [
            $loginField => $request->username,
            'password' => $request->password,
        ];

        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {


            $email = Auth::user()->email;

            Cookie::queue('username', $request->username, 60 * 24 * 365);

            if ($remember) {
                Cookie::queue('password', $request->password, 60 * 24);
            }

            Session::put('mysession',$credentials);

            return redirect()->route('dashboard')->with('success' , 'Berhasil Masuk !<br>Hallo '. Auth::user()->front_name);
        } else {

            $user = User::where($loginField, $credentials[$loginField])->first();

            if ($user) {

                return redirect()->route('log')->with('error', 'Password yang Anda masukkan salah.');
            } else {

                return redirect()->route('log')->with('error', 'Email atau nomor ponsel tidak terdaftar.');
            }
        }
    }


    public function authLogMobile(Request $request){

        $username = $request->username;
        $password = $request->password;

        $loginField = filter_var($username, FILTER_VALIDATE_EMAIL) ? 'email' : 'user_phone';

        $credentials = [
            $loginField => $username,
            'password' => $password,
        ];


        if(Auth::attempt($credentials,true)){
            $user = Auth::user();
            Session::put('mysession',$credentials);
            if ($user) {
                $token = md5(time()) . '.' . md5($username);

                $user->forceFill([
                    'api_token' => $token,
                    // 'remember_token' => $token,
                ])->save();

                return response()->json([
                    'token' => $token,
                ],200);
            } else {
                return response()->json([
                    'message' => 'Gagal mendapatkan objek pengguna setelah otentikasi.',
                ], 500);
            }
        }


        return response()->json([
            'message' => 'Email atau Password salah',
        ],401);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('log');
    }


    public function logoutMobile(Request $request){
        $token = $request->api_token;

        if($token == NULL || empty($token)){
            return response()->json([
                'succes' => false,
                'message' => 'Anda Harus Login Ulang'
            ],401);
        }

        $user = User::where('api_token',  $token)->first();
        if ($user) {
            // Temukan user dengan api_token
            $user->api_token = null;
            $user->save();

            Auth::logout();
            return response()->json([
                'message' => 'success'
            ],200);
        }

        return response()->json([
            "success" => false,
            "message" => "Anda akan dialihkan ke login"
        ],401);

    }




    public function addUser(Request $request){
        try {
            $now = now();

            $newuser = User::create([
                'front_name' => $request->namadepan,
                'last_name' => $request->namabelakang,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_phone' => $request->nomorponsel,
                'role_id' => 2,
                'status_us er_id' => 1,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            return redirect()->route('log')->with('success', 'Registrasi berhasil! Silakan masuk.');
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) { // Duplicate entry error code
                return redirect()->route('regis')->with('error', 'Email atau nomor ponsel sudah terdaftar.');
            }

            return redirect()->route('regis')->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');
        } catch (Exception $e) {
            return redirect()->route('regis')->with('error', 'Terjadi kesalahan saat registrasi. Silakan coba lagi.');
        }
    }

    public function addUsermobile(Request $request){
        try {
            $now = now();

            $newuser = User::create([
                'front_name' => $request->namadepan,
                'last_name' => $request->namabelakang,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'user_phone' => $request->nomorponsel,
                'role_id' => 2,
                'status_user_id' => 1,
                'api_token' => null,
                'created_at' => $now,
                'updated_at' => $now
            ]);

            return response()->json([

                'success' => true,
                'message' => 'Registrasi berhasil! Silakan masuk.',
                'body' => $newuser
            ],200);
        } catch (QueryException $e) {
            $errorCode = $e->errorInfo[1];

            if ($errorCode == 1062) {
                return response()->json([
                    'success' => false,
                    'message' => 'Email atau nomor ponsel sudah terdaftar.'
                ],401);
            }

            return response()->json([
                'success' => false,
                'message' => '1. Terjadi kesalahan saat registrasi. Silakan coba lagi. '
            ],409);
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat registrasi. Silakan coba lagi.'
            ],402);
        }
    }

    public function getUser(Request $request){

        $token = $request->api_token;
        if($token == NULL){
            return response()->json([
                'succes' => false,
                'message' => 'Anda Harus Login Ulang'
            ],401);
        }
        $data = User::where("api_token", $token)->first();

        if (! empty($data) && $data->api_token == $token) {
            return response()->json($data, 200);
        } elseif (empty($data)) {
            return response()->json([
                'succes' => false,
                'message' => 'Anda Harus Login Ulang'
            ],401);
        } else {
            return response()->json([
                'succes' => false,
                'message' => 'Gagal Mendapatkan User anda akan logout'
            ],402);
        }

    }


}
