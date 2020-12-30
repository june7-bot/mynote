<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use function Sodium\add;

class NoteController extends Controller
{

     public function __construct(){
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user()->id;
        $notes = Note::where('user_id',$user)->orderby('created_at', 'desc')->first();
        $forSide = Note::where('user_id', $user)->orderby('created_at', 'desc')->get();

        return view('notes.note', compact('notes','forSide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.input');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;

        Note::create([
            'user_id' => $user,
            'title' => $request->title,
            'content' => $request->contents,
        ]);

        return redirect('notes');
//Post Redirect Get 패턴 적용해야함
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = auth()->user()->id;
        $notes = Note::where('id',$id)->first();
        $forSide = Note::where('user_id', $user)->orderby('created_at', 'desc')->get();

        return view('notes.note',compact('notes', 'forSide'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function search(){
        $user = auth()->user()->id;
        $content = trim(request()->texts);
        $searchResults = DB::table('notes')->select('title', 'content')
                          ->where('title', 'like', '%' . $content . '%')
                          ->orWhere('content', 'like', '%' . $content . '%'  )
                          ->orderBy('created_at', 'desc')
                          ->get('title', 'content');
        $data = [];
        foreach ($searchResults as $result) {
            Arr::add($data , ['title' => $result->title], ['content' => $result->content] );
        }

        return response()->json($data);
    }
}
