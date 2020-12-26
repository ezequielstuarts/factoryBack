<?php

namespace App\Http\Controllers;

use App\Http\Requests\ServiceC\ServiceCStoreRequest;
use App\Http\Requests\ServiceC\ServiceCUpdateRequest;
use App\Models\ServiceC;
use Illuminate\Http\Request;

class ServiceCController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceC = ServiceC::all();
        return response()->json($serviceC);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceCStoreRequest $request)
    {
        $newServiceC = $request->all();

        $serviceC = ServiceC::create($newServiceC);

        return response()->json($serviceC);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceC  $serviceC
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        ServiceC::findOrFail($id);
        return response()->json($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceC  $serviceC
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceCUpdateRequest $request, $id)
    {

        $serviceC = ServiceC::findOrFail($id);
        $serviceC->fill($request->input())->save();

        return response()->json($serviceC);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceC  $serviceC
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serviceC = ServiceC::findOrFail($id);
        $serviceC->delete();
        return response()->json(null,204);
    }
}
