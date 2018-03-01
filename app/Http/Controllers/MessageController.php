<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Http\Request;
use App\User;
use App\SoftwareEngineering;
use Illuminate\Support\Facades\DB;
use App\TongjiNews;

class MessageController extends Controller
{
    //分页器自己重构一个
    public function getMessage()
    {
        $email = Cookie::get('email');
        $school = DB::connection('mysql')->table('spider')->where('email', $email)->value('school');
        if ($school == '同济大学软件学院') {
            $message = SoftwareEngineering::paginate(15);
        }
        return response()->json(['message' => $message]);


    }

    public function getSeMessage()
    {

        $message = SoftwareEngineering::paginate(15);
        return response()->json(['message' => $message]);
    }


    public function getTjnewsMessage()
    {
        $message = TongjiNews::paginate(15);
        return response()->json(['message' => $message]);
    }



}
