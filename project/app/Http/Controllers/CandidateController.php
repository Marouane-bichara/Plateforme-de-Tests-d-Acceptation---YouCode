<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Candidates;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCandidateInfoRequest;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $candidate = User::findOrFail(Auth::user()->id);
        $candidateinfo = Candidates::where('user_id', $candidate->id)->first();
        return view('front.candidates.home', ['candidate' => $candidate, 'candidateinfo' => $candidateinfo]);
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
    public function store(StoreCandidateInfoRequest $request)
    {
        // Validate the request
        $validated = $request->validated();
    
        // Get the authenticated user
        $candidate = Auth::user();
    
        // Check if a candidate with the same phone already exists
        if (Candidates::where('phone', $request->phone)->exists()) {
            return redirect()->back()->withErrors(['phone' => 'This phone number is already in use.'])->withInput();
        }
    
        if(Candidates::where('user_id', $candidate->id)->exists())
        {
            return redirect()->back()->withErrors(['phone' => 'This user is already in use.'])->withInput();
        }
        // Store the file if uploaded
        $documentPath = $request->hasFile('image') 
            ? $request->file('image')->store('images', 'public') 
            : null;
    
        // Save candidate data
        $candidatesave = Candidates::create([
            'user_id' => $candidate->id,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'document' => $documentPath,
        ]);
    
        // Redirect back with success message
        return redirect()->back();
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
