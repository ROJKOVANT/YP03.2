<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function postNews(Request $request){
        $this->validate($request, [
            'news'=> 'required|max:1000'
        ]);

        Auth::user()->statuses()->create([
            'body'=> $request->input('news')
        ]);

        return redirect()->route('home')->with('info', 'Запись успешно добавлена.');
    }

    public function getIndex(){
        if ( Auth::check() ){
            $statuses = News::where(function ($query){
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->friends()->pluck('id'));
            })->orderBy('created_at', 'desc')->paginate(10);
            return view('news.index', compact('statuses'));
        }
    }

    public function postReply(Request $request, $newsId){
        $this->validate($request, [
            "reply-{$newsId}" => 'required|max:1000'
        ],[
            'required' => 'Обязательно для заполнения'
        ]);

        $news = News::find($newsId);

        if( !$news) redirect()->route('news.index');

        if ( ! Auth::user()->isFriendWith($news->user)
            && Auth::user()->id !== $news->user->id ) {
            return redirect()->route('news.index');
        }

        $reply = new News();
        $reply->body = $request->input("reply->{$news->id}");
        $reply->user()->associate(Auth::user() );
        $reply->replies()->save($reply);

        return redirect()->back();
    }
}
