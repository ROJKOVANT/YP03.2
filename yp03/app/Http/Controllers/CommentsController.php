<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Tiding;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
//    public function store(Request $request, Tiding $id){
//
//        $tiding_id = $request->$id;
//
//        Auth::user()->comments()->create([
//            'body'=> $request->input('body'),
//            'tiding_id' => $tiding_id->$id
//        ]);
//
//        require back();
//
//    }
    public function stores(Request $request){
        if (Auth::check()){
            $tiding = Tiding::where('slug', $request->tiding_slug)->first();
            if ($tiding){
                Comment::create([
                    'tiding_id' => $tiding->id,
                    'user_id' => Auth::user()->id,
                    'body' => $request->body
                ]);
            }
            else{
                redirect()->back()->with('message', 'No Such Post Found');
            }
        }
        else{
            redirect()->back()->with('message', 'Login first to comment');
        }
        return redirect()->back();
    }
}
