<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\ContactType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactTypesController extends Controller
{
    public function index(){
        return response()->json(ContactType::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:Contact_types',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        $input = $request->all();
        try{
            $contact_type = ContactType::create($input);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($contact_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*
        TODO MANEJO DE ERRORS (UNAUTHORIZED)
        */
        return response()->json(ContactType::findOrFail($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:contact_types,name',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        try{
            $contact = ContactType::findOrFail($id);
            $contact->name = $request->name;
            $contact->save();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($contact);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $contact = ContactType::findOrFail($id);
            $contact->delete();
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json(null,204);
    }
}
