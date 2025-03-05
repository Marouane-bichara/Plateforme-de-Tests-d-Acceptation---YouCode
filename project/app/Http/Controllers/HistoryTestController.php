<?php

namespace App\Http\Controllers;

use App\Models\Questions;
use App\Models\Candidates;
use App\Models\HistoryTest;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class HistoryTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $questionsNum = Questions::count();

        // Fetch the next question that is NOT in HistoryTest
        $questions = Questions::whereNotIn('id', HistoryTest::pluck('question_id'))
            ->orderBy('id')
            ->first();
        
    
        $candidate = User::findOrFail(Auth::user()->id);
        $candidateinfo = Candidates::where('user_id', $candidate->id)->first();
    
    
        return view('front.candidates.questions.questions', ['candidate' => $candidate, 'candidateinfo' => $candidateinfo , 'questions' => $questions ]);
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
    public function store(Request $request)
    {
        //
        HistoryTest::create([
            'candidate_id' => Auth::user()->id,
            'question_id' => $request->question_id,
            'answer_id' => $request->answer_id,
        ]);

        return redirect()->route('questionsAndAnswers.index');
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
    }
}
