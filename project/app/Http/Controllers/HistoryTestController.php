<?php

namespace App\Http\Controllers;

use App\Models\Answers;
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
        $resault = 60;
        $candidate = User::findOrFail(Auth::user()->id);
        $candidateinfo = Candidates::where('user_id', $candidate->id)->first();

        $questions = Questions::whereNotIn('id', HistoryTest::where('candidate_id', $candidate->id)->pluck('question_id'))
        ->orderBy('id')
        ->first();

            if(!$questions)
            {
                $idquestions = HistoryTest::where('candidate_id', $candidate->id)->pluck('question_id');
                $allquestionsans = Questions::whereIn('id', $idquestions)->get();
                // dd($allquestionsans[1]->points);   
                $numberofquestions = count($allquestionsans);

                $answersofUser = HistoryTest::where('candidate_id', $candidate->id)->pluck('answers_id');


                $theanswers = Answers::whereIn('id', $answersofUser)->get();


                $score = 0;


                for($x = 0; $x < $numberofquestions; $x++)
                {
                    if($theanswers[$x]->is_correct == true)
                    {
                        $score += $allquestionsans[$x]->points;
                    }
                }

          ; 

                if($score >= $resault)
                {
                    dd('Accepted');
                }
                else
                {
                    dd('Refused');
                }

            }
    

    
    
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
            'answers_id' => $request->answer_id,
            'question_id' => $request->question_id,
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
