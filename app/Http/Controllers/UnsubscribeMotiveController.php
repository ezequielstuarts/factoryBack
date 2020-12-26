<?php

namespace App\Http\Controllers;

use App\Http\Requests\UnsubscribeMotive\UnsubscribeMotiveStoreRequest;
use App\Models\UnsubscribeMotive;
use Exception;
use Illuminate\Http\Request;

class UnsubscribeMotiveController extends Controller
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
    public function store(UnsubscribeMotiveStoreRequest $request)
    {
        $input = $request->all();
        $motive = UnsubscribeMotive::create($input);

        return response()->json($motive);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\UnsubscribeMotive  $motive
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $motive = UnsubscribeMotive::all($id);
        return response()->json($motive);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\UnsubscribeMotive  $motive
     * @return \Illuminate\Http\Response
     */
    public function edit(UnsubscribeMotive $motive)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\UnsubscribeMotive  $motive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnsubscribeMotive $motive)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\UnsubscribeMotive  $motive
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnsubscribeMotive $motive)
    {
        //
    }
}
