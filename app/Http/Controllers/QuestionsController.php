<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $questions = DB::table('questions')->get();
        return view('adminlte/question/question',compact('questions'));
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

        DB::table('questions')->insert(
            [
                'judul' => $request->judul,
                'isi' => $request->isi
            ]
        );

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
        $question = DB::table('questions')->where('id', '=', $id)->first();
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
        $question = DB::table('questions')->where('id', '=', $id)->first();
        return view('adminlte/question/update-question', compact('question'));
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

        DB::table('questions')->where('id', $id)->update(
            [
                'judul' => $request->judul,
                'isi' => $request->isi
            ]
        );

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
        DB::table('questions')->where('id', $id)->delete();
        return redirect('question')->with('status', 'Question deleted successfully!');
    }
}
