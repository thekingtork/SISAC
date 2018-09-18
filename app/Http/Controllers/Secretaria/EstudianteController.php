<?php

namespace ATS\Http\Controllers\Secretaria;

use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use ATS\Departamento;
use ATS\Estudiante;
use Illuminate\Http\Request;
use ATS\Http\Requests\CreateEstudianteRequest;
use ATS\Http\Requests\UpdateDocenteRequest;
use ATS\Http\Requests\UpdateEstudianteRequest;
use ATS\Municipio;
use ATS\Grupo;
use ATS\Http\Controllers\Controller;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantes = Estudiante::all();
        return view('admin.estudiantes.index',compact('estudiantes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departamentos = Departamento::pluck('name','id');
        $grados = $this->getSalon();
        return view('admin.estudiantes.create',compact('departamentos','grados'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateEstudianteRequest $request)
    {
        $estudiante = new Estudiante($request->all());
        $estudiante->save();
        return redirect()->route('estudiantes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $municipio = Municipio::findOrFail($estudiante->birthcity);
        return view('admin.estudiantes.show', compact('estudiante','municipio'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante= Estudiante::findOrFail($id);
        $departamentos = Departamento::pluck('name','id');
        $grados = $this->getSalon();
        return view('admin.estudiantes.edit',compact('estudiante','grados','departamentos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEstudianteRequest $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->fill($request->all());
        $estudiante->save();
        return redirect()->route('estudiantes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ATS\Estudiante  $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();
        return redirect()->back();
    }

    /**
     * @return array
     */
    public function getSalon (): array
    {
        $data = Grupo::all();
        $grados = [];
        foreach ($data as $key => $value) {
            $grados[$key + 1] = $value->NameAula;
        }
        return $grados;
    }
}