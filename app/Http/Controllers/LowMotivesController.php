<?php

namespace App\Http\Controllers;

use App\Models\LowMotive;
use Exception;
use Illuminate\Http\Request;

class LowMotivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(LowMotive::all());
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
            'name' => 'required|unique:low_motives',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        $input = $request->all();
 
        $lowMotive = LowMotive::create($input);

        return response()->json($lowMotive);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LowMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function show(LowMotive $lowMotive)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LowMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function edit(LowMotive $lowMotive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LowMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LowMotive $lowMotive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LowMotive  $lowMotive
     * @return \Illuminate\Http\Response
     */
    public function destroy(LowMotive $lowMotive)
    {
        //
    }
}
