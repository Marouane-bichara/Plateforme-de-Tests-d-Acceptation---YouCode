<?php

namespace App\Http\Controllers;

use App\Models\Answers;
use App\Models\Questions;
use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreQuestionsRequest;



class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $questions = Questions::with('answers')->get();
        $user = Candidates::where('user_id', Auth::user()->id)->first();
        if($user->resault == 'Refused')
        {
            $resault = $user->resault;
            return view('front.candidates.resault.resault', ['resault' => $resault]);
        }else{
            return view('back.admin.questions', compact('questions'));
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQuestionsRequest $request)
    {   
        //
        $validated = $request->validated();


        $questions = Questions::create([
            'content' => $validated['content'], 
            'points' => $validated['points'],
        ]);

        foreach($validated['answers'] as $index => $answer)
        {
            Answers::create([
                'question_id' => $questions->id,
                'content' => $answer['content'],
                'is_correct' => ($index == $validated['correct_answer']) ? 1 : 0, 
            ]);
        }

        return redirect()->back()->with('success', 'Question and answers saved successfully!');

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

        $question = Questions::findOrFail($id);

        // Delete associated answers first
        $question->answers()->delete();
    
        // Delete the question
        $question->delete();
    
        return redirect()->back()->with('success', 'Question and answers deleted successfully!');
    }
}
