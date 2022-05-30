<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Domain;
use Facades\App\Helpers\Json;
use App\User;

class SftpinfoController extends Controller
{
    public function index(){
        $domain = Domain::where('user_id', '=', User::find(auth()->id())->id)
        ->first();
        
        $result = compact('domain');
        Json::dump($result);
        
        if(!Domain::where('user_id', '=', User::findOrFail(auth()->id())->id)->exists()){
            return view('feedback', $result);
        }else{
            return view('user.sftpinfo', $result);
        }
        

    }


}
