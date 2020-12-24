<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Service::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        $newService = $request->all();
        try{
            $service = Service::create($newService);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($service);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Service::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try{
            $service = Service::findOrFail($id);
            $service->fill($request->input())->save();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($service);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $service = Service::findOrFail($id);
            $service->delete();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json(null,204);
    }
}