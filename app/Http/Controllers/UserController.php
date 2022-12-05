<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    
    public function signupPage(){
        return view('user.signup');
    }

    public function loginPage(){
        return view('user.login');
    }

    public function userList(){
        $userlist = DB::select('select * from users');

        return view('user.userlist',[
            'userlist' => $userlist
        ]);
    }

    /**
     * @param Request
     * @return Response
     */
    public function signup(Request $request){
        $name = (string)$request->input('name');
        $nickname = (string)$request->input('nickname');
        $email = (string)$request->input('email');
        $password = $request->input('password');
        $tel = $request->input('tel');

        DB::insert('insert into users (name, nickname, email, password, tel) values (?, ?, ?, ?, ?)', [$name, $nickname, $email, $password, $tel]);

        return redirect('/user/list')->with('success', 'user has added');
    }

    /**
     * @param Request
     * @return Response
     */
    public function login(Request $request){
        $id = (int)$request->input('id');
        $password = (string)$request->input('password');

        $user = DB::select('select name, password from users where id = ?', [$id]);

        foreach ($user as $single) {
            if ($single->password == $password) {
                session([
                    'user_id'=>$id,
                    'user_name'=>$single->name
                ]);
                return redirect('/');
            } else {
                return redirect('user/login')->with('failed', 'login failed');
            }
        }
    }
}
