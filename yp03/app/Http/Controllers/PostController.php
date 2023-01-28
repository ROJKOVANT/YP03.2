<?php

namespace App\Http\Controllers;


use App\Models\Category;
use App\Models\Post;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function postPost(Request $request){
        $categories = Category::all();


        $this->validate($request, [
            'post'=> 'required|max:500',
            'postContent'=> 'required|max:5000',
            'postCategory' => 'required',
        ]);

        $path = $request->file('post_image')->store('/public/images');
        $params = $request->all();
        $params['post_image'] = $path;
//        $data = $request->validate([
//            'post_image'=> 'required|file',
//        ]);
//        $data['post_image'] = Storage::put('/public/images', $data['post_image']);

        Auth::user()->postes()->create([
            'title'=> $request->input('post'),
            'content'=> $request->input('postContent'),
            'category_id'=>$request->input('postCategory'),
            'post_image' => $request->input('post_image'),
        ]);



        return redirect()->route('post.index', compact('categories'))->with('info', 'Запись успешно добавлена.');
    }

    public function getIndex(){
        $categories = Category::all();
        if ( Auth::check() ){
            $postes = Post::where(function ($query){
                return $query->where('user_id', Auth::user()->id)
                    ->orWhereIn('user_id', Auth::user()->pluck('id'));
            })->orderBy('created_at', 'desc')->paginate(10);
            return view('post.index', compact('postes'), compact('categories'));
        }
    }

}
