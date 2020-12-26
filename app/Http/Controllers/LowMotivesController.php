<?php

namespace App\Http\Controllers;

use App\Models\UnsubscribeMotive;
use Exception;
use Illuminate\Http\Request;

class UnsubscribeMotivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motive = UnsubscribeMotive::all();
        return response()->json($motive);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make($request->all(), [
            'name' => 'required|unique:unsubscribe_motives',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        $input = $request->all();
 
        $lowMotive = UnsubscribeMotive::create($input);

        return response()->json($lowMotive);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnsubscribeMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function show(UnsubscribeMotive $lowMotive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnsubscribeMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function edit(UnsubscribeMotive $lowMotive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnsubscribeMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnsubscribeMotive $lowMotive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnsubscribeMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnsubscribeMotive $lowMotive)
    {
        //
    }
}
