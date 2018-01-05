<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Tarea;


class TareaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Tarea::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!$request->input('titulo') || !$request->input('descripcion'))
            return response()->json([ 'mensaje' => 'Faltan parametros para procesar la solicitud' ], 400);
        $tarea = Tarea::create([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion')
        ]);
        return response()->json($tarea, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tarea = Tarea::find($id);
        if(!$tarea)
            return response()->json([ 'mensaje' => 'No se encontro el recurso solicitado' ], 404);
        return response($tarea, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$request->input('titulo') || !$request->input('descripcion'))
            return response()->json([ 'mensaje' => 'Faltan parametros para procesar la solicitud' ], 400);
        $tarea = Tarea::find($id);
        if(!$tarea)
            return response()->json([ 'mensaje' => 'No se encontro el recurso solicitado' ], 404);
        $tarea->update([
            'titulo' => $request->input('titulo'),
            'descripcion' => $request->input('descripcion')
        ]);
        return response()->json($tarea, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tarea = Tarea::find($id);
        if(!$tarea)
            return response()->json([ 'mensaje' => 'No se encontro el recurso solicitado' ], 404);
        $tarea->delete();
        return response()->json([ 'mensaje' => 'Se ha eliminado correctamente el recurso' ], 200);
    }
}
