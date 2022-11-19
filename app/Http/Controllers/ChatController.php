<?php

namespace App\Http\Controllers;

use App\Models\Combine;
use App\Models\User;

class ChatController extends Controller
{
    public function index()
    {
        $usersChat = Combine::where('user_first_active', 1)
                            ->where('user_secound_active', 1)
                            ->where('active', 1)
                            ->where('user_secound_id', auth()->user()->id)
                            ->with('users')
                            ->get();

        // $usersChat = Combine::whereUser_first_activeAndUser_secound_activeAndActiveAndUser_secound_id(1, 1, 1, auth()->user()->id)->with('users')->get();

        $chatSelect = [];

        foreach($usersChat as $userChat){
            $userId = $userChat->user_first_id;
            $user   = User::whereId($userId)->get();

            $chatSelect[] = [
                'id'        => $user[0]->id,
                'photo'     => $user[0]->photo,
                'nick_name' => $user[0]->nick_name
            ];
        }

        if(!$usersChat){
            $usersChat = null;
        }

        return view('chat.index', ['usersChat' => $usersChat, 'chatSelect' => $chatSelect]);
    }
}
