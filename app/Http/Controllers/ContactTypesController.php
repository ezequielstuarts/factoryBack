<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactTypes\ContactTypeStoreRequest;
use App\Http\Requests\ContactTypes\ContactTypeUpdateRequest;
use Validator;
use App\Models\ContactType;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactTypesController extends Controller
{
    public function index(){
        $contact = ContactType::all();
        return response()->json($contact);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ContactTypeStoreRequest $request)
    {
        $input = $request->all();
        $contact_type = ContactType::create($input);
 
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
        $contact = ContactType::findOrFail($id);
        return response()->json($contact);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ContactType  $contact_type
     * @return \Illuminate\Http\Response
     */
    public function update(ContactTypeUpdateRequest $request, $id)
    {
        $contact = ContactType::findOrFail($id);
        $contact->name = $request->name;
        $contact->save();

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
        $contact = ContactType::findOrFail($id);
        $contact->delete();

        return response()->json(null,204);
    }
}
