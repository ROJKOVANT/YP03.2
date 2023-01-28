<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\News;
use App\Models\Tiding;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function getProfile($name)
    {
        $user = User::where('name',$name)->first();

        if(!$user){
            abort(404);
        }

        $statuses = $user->statuses()->notReply()->get();
        $tidings = $user->tidings()->notReply()->get();

        return view('profile.index', [
            'user'=> $user,
            'statuses'=>$statuses,
            'tidings'=>$tidings,
            'authUserIsFriend' => Auth::user()->isFriendWith($user)
        ]);
    }

    public function getEdit(){

    return view('profile.edit');

    }

    public function postEdit(Request $request){
        $this->validate($request, [
            'name' => 'max:50',
            'city' => 'max:50',
            'floor' => 'max:50',
            'fio' => 'max:250',
            'age' => 'max:250',
            'birthday' => 'max:250',
            'avatar' => 'max:250',
        ]);

        $file = $request['avatar'];
        $path = Storage::disk('public')->put('avatars', $file);
        Auth::user()->update([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'floor' => $request->input('floor'),
            'fio' => $request->input('fio'),
            'age' => $request->input('age'),
            'birthday' => $request->input('birthday'),
            'avatar' => '/storage/'.$path,
            ]);
        return redirect()->route('profile.edit')->with('info', 'Профиль успешно обновлен!');
    }

    public function getIndex(){
        if ( Auth::check() ){
            $statuses = News::where(function ($query){
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->pluck('id'));
            })->orderBy('created_at', 'desc')->paginate(10);
            return view('profile.index', compact('statuses'));
        }
    }

}
