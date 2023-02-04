<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ParagraphsController;
use Illuminate\Http\Request;
use App\Models\Tiding;
use Auth;
use App\Models\User;
use App\Models\Paragraph;

class TidingsController extends Controller
{
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $categori = Paragraph::all();
        if ($id === 'all' || $id === ''){
            return view('tidings.index')->with('tidings', Tiding::all());
        }else{
            $categori = Paragraph::all();
            foreach ( $categori as $item){
                if ($item->id == $id){
                    return view('tidings.index')->with('tidings', Tiding::all()->where('paragraph_id', '===', $id));
                }
            }
            return view('tidings.index')->with('tidings', Tiding::all());
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tidings.create')->with('paragraphs', Paragraph::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            "title" => "required ",
            "content" => "required",
            "paragraph_id" => "required",
            "picture" => "required|image",
        ]);

        $picture = $request->picture;
        $picture_new_name = time().$picture->getClientOriginalName();
        $picture->move('uploads/tidings/', $picture_new_name);


        Auth::user()->tidings()->create([
            "title" => $request->input('title'),
            "content" => $request->input('content'),
            "paragraph_id" => $request->input('paragraph_id'),
            "picture" => 'uploads/tidings/'.$picture_new_name,
            "slug" => $request->input('title')//str_slug($request->title)
        ]);

        return redirect()->back();

//        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {


        $tiding = Tiding::find($id);

//        $this->authorize('update', $tiding);

        return view('tidings.edit')->with('tidings', $tiding)->with('paragraphs', Paragraph::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tiding = Tiding::find($id);

        $this->validate($request,[
            "title" => "required ",
            "content" => "required",
            "paragraph_id" => "required",
        ]);

        if($request->hasFile('picture')){
            $picture = $request->picture;
            $picture_new_name = time().$picture->getClientOriginalName();
            $picture->move('uploads/tidings/',$picture_new_name);

            $tiding->picture = 'uploads/tidings/'.$picture_new_name;
        }

        $tiding->title = $request->input('title');
        $tiding->content = $request->input('content');
        $tiding->paragraph_id = $request->input('paragraph_id');
        $tiding->save();

        return redirect()->route('tidings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tiding = Tiding::find($id);
        $tiding->delete();

        return redirect()->route('tidings');

    }

    public function trashed()
    {
        $tiding = Tiding::onlyTrashed()->get();

//        dd($tiding);

        return view('tidings.softdeleted')->with('tidings', $tiding);
    }

    public function hdelete($id)
    {
        $tiding = Tiding::withTrashed()->where('id', $id)->first();
        $tiding->forceDelete();

        return redirect()->back();
    }

    public function restore($id)
    {
        $tiding = Tiding::withTrashed()->where('id', $id)->first();
        $tiding->restore();

        return redirect()->back();
    }
//    public function searchTiding(Request $request){
//        $s = $request->s;
//        $tiding = Tiding::where('title', 'LIKE', "%{$s}%")->orderBy('title')->paginate(10);
//
//        return view('tidings.index', compact('tiding'));
//
//    }
}
