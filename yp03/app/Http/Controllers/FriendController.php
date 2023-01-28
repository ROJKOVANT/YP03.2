<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friends.index', [
            'friends' => $friends,
            'requests' => $requests,
        ]);
    }

    public function getAdd($name)
    {
        $user = User::where('name', $name)->first();

        if (!$user){
            return redirect()->route('/home')
                ->with('info', 'Пользователь не найден!');
        }

        if ( Auth::user()->id === $user->id ){
            return redirect()->route('/home');
        }

        if ( Auth::user()->hasFriendRequestsPending($user) || $user->hasFriendRequestsPending(Auth::user() )  ){
            return redirect()->route('profile.index', ['name' => $user->name])
                ->with('info', 'Пользователю отправлен запрос в друзья!');
        }
        if ( Auth::user()->isFriendWith($user) ){
            return redirect()->route('profile.index', ['name' => $user->name])
                ->with('info', 'Пользователь уже в друзьях!');
        }
        Auth::user()->addFriend($user);

        return redirect()->route('profile.index', ['name' => $name])
            ->with('info', 'Пользователю отправлен запрос в друзья!');
    }

    public function getAccept($name){
        $user = User::where('name', $name)->first();

        if (!$user){
            return redirect()->route('/home')
                ->with('info', 'Пользователь не найден!');
        }

        if (! Auth::user()->hasFriendRequestsReceived($user) ){
                return redirect()->route('/home');
        }

        Auth::user()->acceptFriendRequests($user);

        return redirect()->route('profile.index', ['name' => $user->name])
            ->with('info', 'Запрос в друзья принят!');
    }

    public function postDelete($name){
        $user = User::where('name', $name)->first();

        if ( ! Auth::user()->isFriendWith($user) ){
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Пользователь удален из друзей!');
    }
}
