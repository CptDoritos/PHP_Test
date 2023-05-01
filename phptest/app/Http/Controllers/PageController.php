<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Users;
use App\Models\Messages;

use Illuminate\Support\Facades\Storage;


class PageController extends Controller
{
    public function setUser(Request $request){

        $fields = $request->validate([
            'username' => 'required|string',
            'name' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = Users::create([
            'username' => $fields['username'],
            'name' => $fields['name'],
            'password' => md5($fields['password'])
        ]);
        return response($user, 201);

    }

    public function getUsers(){
        $arrayUsers = Users::all();
        return response($arrayUsers, 201);
    }
    public function getUser($search){
        $User = Users::where('username', 'LIKE', '%'.$search.'%') 
        ->orWhere('name', 'LIKE', '%'.$search.'%')
        ->get();
return response($User, 201);
    }

    public function setMessage(Request $request){
    $fields = $request->validate([
        'contents' => 'required|string', 
        'image' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'user_id' => 'required|integer'
    ]);

    // Save image file to storage and get the file path
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images');
        $imagePath = Storage::url($imagePath);
    }

    $message = Messages::create([
        'contents' => $fields['contents'],
        'image' => $imagePath,
        'user_id' => $fields['user_id']
    ]);

    return response($message, 201);
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
        if(sizeof($users)>0){
            $idUser = $users[0]->id;
            $messages = Users::find($idUser)->users;
        }

        foreach ($users as $user) {
            // ...
        }
        return response($users, 201);
    }
}

