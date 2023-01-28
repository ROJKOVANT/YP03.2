<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Auth;
use App\Models\User;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function postCategory(Request $request){
        $this->validate($request, [
            'category'=> 'required|max:500'
        ]);

        Category::create([
            'body'=> $request->input('category')
        ]);
        return redirect()->route('category.index')->with('info', 'Запись успешно добавлена.');
//        $data = $request->validate();
//        Category::firstOrCreate($data);
//        return redirect()->route('home')->with('info', 'Запись успешно добавлена.');
    }



    public function getIndex(){

        if ( Auth::check() ){
            $categoryes = Category::where(function ($query){
            })->orderBy('created_at', 'desc')->paginate(10);
            return view('category.index', compact('categoryes'));
        }
    }


}
