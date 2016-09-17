<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class UserController extends Controller
{

    /**
     * Login attempt
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON
     */
    public function login(\App\Http\Requests\LoginUserRequest $request)
    {
        $user = \App\User::where(['name' => $request->get('name')])->firstOrFail();
        if (\Hash::check($request->get('password'), $user->password)) {
            $userArray = $user->toArray();
            $userArray['token'] = $user->token;
            return $this->_responce([
                'status' => 200,
                'user' => $userArray
            ]);
        } else {
            return $this->_responce([
                'status' => 404,
                'message' => 'Can\'t find.'
            ]);
        }
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @return JSON
     */
    public function index()
    {
        if (is_null(\Request::header('offset')) || is_null(\Request::header('limit'))) {
             return $this->_responce([
                'status' => 400,
                'message' => 'No offset and limit in header.'
            ]);
        }
        return $this->_responce([
            'status' => 200,
            'users' => \App\User::skip(\Request::header('offset'))
                ->take(\Request::header('limit'))
                ->get(),
            'count' => \App\User::count()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return JSON
     */
    public function store(\App\Http\Requests\StoreUserRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return JSON
     */
    public function show()
    {
        $user = new \App\User();
        $user->name = 'Damian';
        $user->password =  \Hash::make('damian123');
        $user->token = "testToken";
        $user->alive = 1;
        dd($user->save());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return JSON
     */
    public function update(Request $request, $id)
    {
        //
    }

}
