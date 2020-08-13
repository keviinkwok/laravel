<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Question;
use App\Tag;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   
        // $questions = DB::table('questions')->get();
        $questions = Auth::user()->questions;
        return view('adminlte/question/myquestion',compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminlte/question/add-question');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required'
            
        ]);

        // DB::table('questions')->insert(
        //     [
        //         'judul' => $request->judul,
        //         'isi' => $request->isi
        //     ]
        // );

        // $insert = Question::create(
        //     [
        //         'judul' => $request->judul,
        //         'isi' => $request->isi
        //     ]
        // );
        // Auth::user()->questions()->save($insert);
        
        $tags_arr = explode(',',$request->tags);
        $tag_id = [];
        foreach($tags_arr as $tag_name){
            $tag = Tag::firstOrCreate(['tag' => $tag_name]);
            $tag_id[] = $tag->id;
        }

        // dd($tag_id);

        $insert = Auth::user()->questions()->create(
                    [
                        'judul' => $request->judul,
                        'isi' => $request->isi
                    ]
                );
                // dd($insert);
        $insert->tags()->sync($tag_id);
        return redirect('question')->with('status', 'Question added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        // $question = DB::table('questions')->where('id', '=', $id)->first();
        $question = Question::find($id);
        return view('adminlte/question/detail-question', compact('question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $question = DB::table('questions')->where('id', '=', $id)->first();
        $question = Question::find($id);
        $tagname = [];
        foreach ($question->tags as $tag) {
            $tagname[] = $tag->tag;
        }
        $stringTag = implode(",",$tagname);
        return view('adminlte/question/update-question', compact('question','stringTag'));
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
        $validatedData = $request->validate([
            'judul' => 'required',
            'isi' => 'required'
        ]);

        // DB::table('questions')->where('id', $id)->update(
        //     [
        //         'judul' => $request->judul,
        //         'isi' => $request->isi
        //     ]
        // );

        // Question::where('id',$id)->update(
        //     [
        //         'judul' => $request->judul,
        //         'isi' => $request->isi
        //     ]
        // );

        Question::find($id)->tags()->detach();
        
        $tags_arr = explode(',',$request->tags);
        $tag_id = [];
        foreach($tags_arr as $tag_name){
            $tag = Tag::firstOrCreate(['tag' => $tag_name]);
            $tag_id[] = $tag->id;
        }

        // dd($tag_id);
        $user = Auth::user();
        $edit = $user->questions()->where('id',$id)->update(
                    [
                        'judul' => $request->judul,
                        'isi' => $request->isi
                    ]
                );
                
        Question::find($id)->tags()->attach($tag_id);

        return redirect('question')->with('status', 'Question updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // DB::table('questions')->where('id', $id)->delete();
        Question::destroy($id);
        return redirect('question')->with('status', 'Question deleted successfully!');
    }
}
