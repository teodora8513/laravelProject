<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //idi do modela i uzmi grupu recorda
        $questions =Question::orderBy('id','desc')->paginate(5);    //pitanja su sortirana tako da prvo izlaze najskorija
        //vrati view i grupu preko loopa
        return view('questions.index')->with('questions',$questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('questions.create');    //create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacija forme
            $this->validate($request, [
                'title'=> 'required|max:255', 'description'=>'required'
            ]);
        //submit formu
                $question=new Question();
                $question->title =$request->title;
                $question->discription=$request->description;
                
        //redirect ako je uspesno na show page
                if($question->save()){
                    return redirect()->route('questions.show', $question->id);
                }else{
                    return redirect()->route('questions.create');
                }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //koristiti model da bi dobili record
        $question = Question::findOrFail($id);  //baca exc ako nema sa tim id-jem
        //pokazati view i proslediti record do view-a
        return view('questions.show')->with('question', $question);
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
}
