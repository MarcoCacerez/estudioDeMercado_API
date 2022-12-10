<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEstudioRequest;
use App\Http\Requests\UpdateEstudioRequest;
use App\Models\Estudio;

class EstudioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {

        $estudios = auth()->user()->load('estudios');
        return response()->json([
            'success' => true,
            "Estudios" => $estudios,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEstudioRequest  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreEstudioRequest $request)
    {
        $estudio = auth()->user()->estudios()->create($request->validated());

        return response()->json([
            "message"=>"Created",
            "estudio"=>$estudio,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Estudio $estudio)
    {
        return response()->json([
            "sucess"=>true,
            "estudio"=>$estudio,
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateEstudioRequest  $request
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(UpdateEstudioRequest $request, Estudio $estudio)
    {

        $estudio->update($request->validated());

        return response()->json([
            "message"=>"Updated",
            "estudio"=>$estudio,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estudio  $estudio
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Estudio $estudio)
    {
        $estudio->delete();
        return response()->json([
            "message"=>"Estudio deleted successfully",
        ]);
    }
}
