<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StarController extends Controller
{
    public function requestAuthenticatePage(){
        return view('star.request');
    }

    public function authenticatePage(){

        $stars = DB::select('select u.id, u.name, u.email, u.tel, s.contents, s.authenticated  from Users u,Star s where u.id=s.user_id;');

        return view('star.authentication',[
            'starlist' => $stars
        ]);
    }

    /**
     * @param Request
     * @return Response
     */
    public function requestAuthentication(Request $request){
        $user_id = session()->get('user_id');
        $agency_id = (string)$request->input('agency_id');
        $contents = (string)$request->input('content');

        DB::insert('insert into Star (user_id, agency_id, contents) values (?, ?, ?)', [$user_id, $agency_id, $contents]);

        return redirect('/star/authPage')->with('success', 'star request has send');
    }

    /**
     * @param Request
     * @return Response
     */
    public function authenticate(Request $request){
        $user_id = (int)$request->input('user_id');
        DB::update('update Star set authenticated = 1 where user_id = ?', [$user_id]);
        $user = DB::select('select name from Users where id = ?', [$user_id]);

        foreach ($user as $user_name) {
            $message = strval($user_name->name)."님은 이제 스타입니다";
            return redirect('/star/authPage')->with('success', $message);    
        }        
    }
}