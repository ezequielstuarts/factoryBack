<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\Contact_type;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
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
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        $input = $request->all();
        try{
            $contact_type = Contact_type::create($input);
        }catch(Exception $e){
            return response()->json($e->getMessage(),500);
        }
        return response()->json($contact_type);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contact_type  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function show(Contact_type $contact_type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Contact_type  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact_type $contact_type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contact_type  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact_type $contact_type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contact_type  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact_type $contact_type)
    {
        //
    }
}
