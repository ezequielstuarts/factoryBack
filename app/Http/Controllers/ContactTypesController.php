<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\ContactType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactTypesController extends Controller
{
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
    public function show(ContactType $contact_type)
    {
        // dd($contact_type);
        $test = ContactType::find($contact_type);
        return $test;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function edit(ContactType $contact_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ContactType $contact_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactType $contact_type)
    {
        //
    }
}
