<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class APIController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json($request->all());
        $users = User::get();
        return response()->json($users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function ws(Request $request)
    {

       $users = User::get();
       $clients = array_pluck($users, 'api_token');

       $data = [
            'clients' => $clients,
            'data' => $request->message,
        ];
        return response()->json($data);
        #return response()->json($request->all());
    }

    public function auth_ws(Request $request)
    {
        $user = DB::table('sessions')->find($request->sid);
        $user = User::find($user->user_id);

        $data = [
            'client' => $user->api_token,
            'method' => 'Методы после инициализации',
            'data' => 'Данные после инициализации...',
        ];
        return response()->json($data);

        #return response()->json($user);
    }

}
