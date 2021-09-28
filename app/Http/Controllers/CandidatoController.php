<?php

namespace App\Http\Controllers;

use App\Candidato;
use App\Vacante;
use Illuminate\Http\Request;

class CandidatoController extends Controller
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
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000', // 1000 un mega
            'vacante_id' => 'required'
        ]);

        
        if($request->file('cv')){

            // Obtener el tmp_name (Ubicacion temporal)
            $pdfCanditado = $request->file('cv');

            // Crear un nombre unico para el archivo
            $nameFile = time(). '.' . $request->file('cv')->extension();

            // Crear la ubicacion donde se va a guardar
            $path_save = public_path('/storage/cv');
            
            // subir el pdf(cv) al servidor
            $pdfCanditado->move($path_save, $nameFile);


        }


        // Save 
        $vacante = Vacante::find($data['vacante_id']);
        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nameFile
        ]);
        

        // Redireccionar a la pag... anterior con mensaje
        return back()->with('estado', 'Tus datos se enviaron Correctamente! Suerte');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
