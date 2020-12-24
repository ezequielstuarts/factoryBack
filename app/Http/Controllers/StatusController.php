<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Status;
use Exception;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return response()->json(Status::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hola');
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:status',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        $input = $request->all();
        try{
            $status = Status::create($input);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($status);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Status::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'unique:status,name',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        try{
            $status = Status::findOrFail($id);
            if(!is_null($request->name)){
                $status->name = $request->name;
            }
            if(!is_null($request->active)){
                $status->active = $request->active;
            }
            $status->save();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($status);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Status  $status
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $contact = Status::findOrFail($id);
            $contact->delete();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json(null,204);
    }
}
