<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\Messages;


class PageController extends Controller
{
    public function setUser(Request $request){

        $fields = $reques->validate([
            'username' => 'required|string',
            'name' => 'required|string',
            'password' => 'required|string'
        ]);

    }




    public function getMessages(){
        $arrayMessages = Messages::all();
        return response($arrayMessages, 201);
    }

    public function getMessage($search){
        $arrayMessages = Messages::where('contents', 'LIKE', '%'.$search.'%')
                        ->get();
        return response($arrayMessages, 201);
    }

    public function getMessagesByUsers($search){
        $users = Users::where('username', 'LIKE', '%'.$search.'%')
			->orWhere('name', 'LIKE', '%'.$search.'%')
			->get();
        $userMessages=[];
        if(sizeof($user)>0){
            $idUser = $user[0]->id;
            $messages = Users::find($idUser)->users;
        }

        foreach ($users as $user) {
            // ...
        }
        return response($users, 201);
    }
}

