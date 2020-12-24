<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Client::all());
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientStoreRequest $request)
    {
        $newClient = $request->all();
        try{
            $client = Client::create($newClient);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($client);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(Client::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientUpdateRequest $request, $id)
    {
        try{
            $client = Client::findOrFail($id);
            $client->fill($request->input())->save();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $client = Client::findOrFail($id);
            $client->delete();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json(null,204);
    }
}
