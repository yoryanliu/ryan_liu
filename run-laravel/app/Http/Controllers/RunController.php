<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use App;
use Config;
use Session;
use App\Game as Game;
use App\Member as Member;
use App\games_members as games_members;
use Illuminate\Support\Facades\Auth;

//use Validator;
//use App\Http\Controllers\Controller;

class RunController extends Controller
{
    function index(){
        $datas = Game::all();
        $i=0;
        $dataList = array();
        foreach($datas as $data){
            $dataList[]=[
                'id' => $data->id,
                'name' => $data->name,
                'detal' => $data->detal,
                'dateStart' => date('Ymd H:i', $data->dateStart),
                'dateEnd' => date('Ymd H:i', $data->dateEnd),
                'registrationStarts' => date('Ymd H:i', $data->registrationStarts),
                'registrationEnds' => date('Ymd H:i', $data->registrationEnds),
                'style' => ($i % 2 == 0) ? 'odd' : 'even',
            ];
            $i++;
        }
        return view('frontEnd/list', ['dataList' => $dataList]);
    }
    function page($id, $lang='en'){
        if ( $id===null ){
            return redirect('/');
        }
        $data = Game::where('id', '=', $id)->first();

        $tpl_data = [
            'id' => $data->id,
            'info_name' => $data->name,
            'info_dateStartToEnd' => date('Ymd H:i', $data->dateStart) . ' ~ ' . date('Ymd H:i', $data->dateEnd),
            'info_registrationStartEnds' => date('Ymd H:i', $data->registrationStarts) . ' ~ '. date('Ymd H:i', $data->registrationEnds),
            'info_detal' => $data->detal,
        ];

        return view('frontEnd/page', $tpl_data);
    }
    function signUp($id, $lang='en'){
        if ( $id===null ){
            return redirect('/');
        }
        return view('frontEnd/signUp', ['id' => $id]);
    }
    function do_signUp(Request $request){
        $this->validate($request, [
            'id' => 'required|numeric|max:12',
            'name' => 'required|max:45',
            'idNo' => 'required|max:10',
            'phone' => 'required|max:10',
            'email' => 'required|email|unique:members|max:100',
        ]);

        $member = new Member;
        $member->name = $request->name;
        $member->idNo = $request->idNo;
        $member->phone = $request->phone;
        $member->email = $request->email;
        $member->save();
        $member->game()->attach( $request->id );

        return redirect('/');
    }
    function admin(){
        $datas = Game::all();
        $i=0;
        $dataList = array();
        foreach($datas as $data){
            $count = $data->games_members->count();
            $dataList[]=[
                'id' => $data->id,
                'name' => $data->name,
                'detal' => $data->detal,
                'dateStart' => date('Ymd H:i', $data->dateStart),
                'dateEnd' => date('Ymd H:i', $data->dateEnd),
                'registrationStarts' => date('Ymd H:i', $data->registrationStarts),
                'registrationEnds' => date('Ymd H:i', $data->registrationEnds),
                'count' => $count,
                'style' => ($i % 2 == 0) ? 'odd' : 'even',
            ];
            $i++;
        }
        return view('backEnd/admin', ['dataList' => $dataList, 'admin' => Auth::user()->admin ]);
    }
    function adminAdd(){
        if ( Auth::user()->admin!=3 ) {
            Auth::logout();
            return redirect('/');
        }
        return view('backEnd/adminAdd');
    }
    // do_adminAdd 未完成
    function do_adminAdd(){
        //
    }
    function joinList($id){
        if ( Auth::user()->admin!=1 ) {
            Auth::logout();
            return redirect('/');
        }
        if ( $id===null ){
            return redirect('/');
        }
        $game = Game::where('id', '=', $id)->first();
        $dataList = [
            'info_name' => $game->name,
            'info_dateStartToEnd' => date('Ymd H:i', $game->dateStart) . ' ~ ' . date('Ymd H:i', $game->dateEnd),
            'info_registrationStartEnds' => date('Ymd H:i', $game->registrationStarts) . ' ~ '. date('Ymd H:i', $game->registrationEnds)
        ];
        return view('backEnd/joinList', ['dataList' => $dataList, 'datasMember' => $game->member]);
    }
    function gameAdd(){
        if ( Auth::user()->admin!=2 ) {
            Auth::logout();
            return redirect('/');
        }
        return view('backEnd/gameAdd');
    }
    function do_gameAdd(Request $request){
        if ( Auth::user()->admin!=2 ) {
            Auth::logout();
            return redirect('/');
        }
        $this->validate($request, [
            'name' => 'required|max:45',
            'detal' => 'required',
            'dateStart' => 'required|date',
            'dateEnd' => 'required|date',
            'registrationStarts' => 'required|date',
            'registrationEnds' => 'required|date',
        ]);

        $games = new Game;
        $games->name = $request->name;
        $games->detal = $request->detal;
        $games->dateStart = strtotime($request->dateStart);
        $games->dateEnd = strtotime($request->dateEnd);
        $games->registrationStarts = strtotime($request->registrationStarts);
        $games->registrationEnds = strtotime($request->registrationEnds);
        $games->save();

        // 轉址
        return redirect('/admin');
    }
}
