<?php

namespace App\Http\Controllers;

use Session;
use App\DA\LoginModel;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

date_default_timezone_set('Asia/Makassar');
class LoginController extends Controller
{
    public function login(){
        return view('login', [
            "title" => "Login"
        ]);
    }

    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    public function simpan_login(request $req){
        $nik = $req->input('nik');
        $password = $req->input('password');

        $check = DB::table('users')->where('nik', $nik)->where('password', MD5($password))->first();
        if ($check)
        {
            $data = LoginModel::getUser($nik);

            $session = $req->session();
            $session->put('auth', $data);

            $this->ensureLocalUserHasRememberToken($data);
            return $this->successResponse($data->token);

        } else {
            return redirect('/login');
        }
    }

    private function generateRememberToken($nik){
        return md5($nik . microtime());
    }

    private function ensureLocalUserHasRememberToken($localUser){
        $token = $localUser->token;

        if (!$localUser->token)
        {
            $token = $this->generateRememberToken($localUser->nik);
            DB::table('users')
            ->where('nik', $localUser->nik)
            ->update([
                'token' => $token
            ]);
            $localUser->token = $token;
        }

        return $token;
    }

    private function successResponse($rememberToken){
        if (Session::has('auth-originalUrl')) {
            $url = Session::pull('auth-originalUrl');
        } else {
            $url = '/';
        }

        $response = redirect($url);
        if ($rememberToken){
            $response->withCookie(cookie()->forever('presistent-token', $rememberToken));
        }

        return $response;
    }
}
