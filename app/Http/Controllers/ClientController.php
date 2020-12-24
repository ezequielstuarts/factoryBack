<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use App\Http\Requests\Client\ClientStoreRequest;
use App\Http\Requests\Client\ClientUpdateRequest;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $clients = Client::all();
        return response()->json($clients);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ClientStoreRequest $request)
    {
        $newClient = $request->all();
        $client = Client::create($newClient);
        
        return response()->json($client);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return response()->json($client);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(ClientUpdateRequest $request, $id)
    {
        $client = Client::findOrFail($id);
        if ($request->has('name') && $request->input('name') != '') {
            $client->name = $request->input('name');
        }
        if ($request->has('surname') && $request->input('surname') != '') {
            $client->surname = $request->input('surname');
        }
        if ($request->has('address') && $request->input('address') != '') {
            $client->address = $request->input('address');
        }
        if ($request->has('floor') && $request->input('floor') != '') {
            $client->floor = $request->input('floor');
        }
        if ($request->has('phone1') && $request->input('phone1') != '') {
            $client->phone1 = $request->input('phone1');
        }
        if ($request->has('phone2') && $request->input('phone2') != '') {
            $client->phone2 = $request->input('phone2');
        }
        if ($request->has('email') && $request->input('email') != '') {
            $client->email = $request->input('email');
        }
        if ($request->has('dni') && $request->input('dni') != '') {
            $client->dni = $request->input('dni');
        }
        if ($request->has('cuit') && $request->input('cuit') != '') {
            $client->cuit = $request->input('cuit');
        }
        if ($request->has('city_id') && $request->input('city_id') != '') {
            $client->city_id = $request->input('city_id');
        }
        if ($request->has('gender') && $request->input('gender') != '') {
            $client->gender = $request->input('gender');
        }
        if ($request->has('ranking') && $request->input('ranking') != '') {
            $client->ranking = $request->input('ranking');
        }
        $client->save();

        return response()->json($client);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();

        return response()->json(null,204);

    }
}
