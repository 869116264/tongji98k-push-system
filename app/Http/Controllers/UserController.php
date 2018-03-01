<?php

namespace App\Http\Controllers;

use Validator;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return "get api/signUp/create";
    }

    /**
     * Store a newly created resource in storage.
     * Store a newly user data in  table users
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $validator = Validator::make($request->all(), [
            'student_id' => 'required|size:7',
            'password' => 'required',
            'email' => 'required|email',
            'school' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        }

        $user = new User;
        $user->student_id = $request->student_id;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->school = $request->school;
        $user->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'this is home page';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return 'this is edit page';
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function signIn(Request $request)
    {

        $user = User::where('email', $request->email)->where('password', $request->password)->first();
        if ($user) {
            $cookie = Cookie::make('email', $request->email);
            $cookie2 = Cookie::make('lk', md5($request->email . config('user.salt')));
            $content = 'you have signed in';
            return response()->json(['content' => $content])
                ->withCookie($cookie2);
        } else {
            $content = 'The email or the password is wrong';
            return response()->json(['content' => $content]);
        }

    }

    public function signOut()
    {
        $cookie = Cookie::forget('email');
        $cookie2 = Cookie::forget('lk');
        return Response::make()->withCookie($cookie)->withCookie($cookie2);
    }
}
