<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class channelController extends Controller
{
    public function createChannelPage(){
        return view('channel.createChannel');
    }

    public function searchChannelPage(){
        return view('channel.searchChannel');
    }

    public function livePage(){
        return view('channel.live');
    }

    /**
     * @param Request
     * @return Response
     */
    public function createChannel(Request $request){
        $star_id = session()->get('user_id');
        $channel_name = (string)$request->input('channel_name');
        
        DB::insert('insert into channel (star_id, channel_name) values (?, ?)', [$star_id, $channel_name]);

        return redirect('/');
    }

    /**
     * @param Request
     * @return Response
     */
    public function searchChannel(Request $request){
        $channel_name = (string)$request->input('channel_name');
        
        $channels = DB::select('select u.name, c.channel_name from users u, channel c where c.channel_name like ? and c.secret = 0 and c.star_id = u.id', ["%".$channel_name."%"]);
        $request->session()->put('success', 'search complete');
        return view('/channel/search',[
            'channel_list'=>$channels
        ]);
    }
}
