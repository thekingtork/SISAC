<?php

namespace Ngsoft\Http\Controllers\Admin;

use Validator;
use Ngsoft\Grupo;
use Illuminate\Http\Request;
use Ngsoft\Http\Controllers\Controller;
class SalonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    private $ng ="";
    private $fondos =  ['primary','secondary','tertiary','quaternary'];
    public function index()
    {
        $fondos = $this->fondos;
        $salones = Grupo::all();
        return view('admin.aulas.index',compact('fondos','salones'));
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
        $validator = $this->ValidateNameOfAula($request);
        if ($validator->fails()){
            return redirect()->route('aulas.show',$request->grade)->withErrors($validator)->withInput();
        }
        $salon = new Grupo($request->all());
        $salon->save();
        return redirect()->route('aulas.show',$salon->grade);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Ngsoft\Grupo  $salon
     * @return \Illuminate\Http\Response
     */
    public function show($grado)
    {
        $aulas = Grupo::where('grade','=',$grado)->get();
        $fondos = $this->fondos;
        return view('admin.aulas.salones',compact('aulas','fondos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return json
     */
    public function edit($id)
    {
        $salon = Grupo::findOrFail($id);
        return response()->json($salon);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Ngsoft\Grupo  $salon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $salon = Grupo::findOrFail($id);
        $validator = $this->ValidateNameOfAula($request);
        if ($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $salon->fill($request->all());
        $salon->save();
        return redirect()->route('aulas.show',$salon->grade);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Ngsoft\Grupo  $salon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $salon = Grupo::findOrFail($id);
        $salon->delete();
        return redirect()->back();
    }

    /**
     * @param $data Valor concatenado de Grado con Nombre
     */
    public function validationAulas($data){
        $aulas = Grupo::all();
        $salones = array();
        foreach ($aulas as $aula){
            array_push($salones,$aula->name_for_validation);
        }
        return (in_array($data,$salones));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function ValidateNameOfAula (Request $request)
    {
        $this->ng = $request->grade;
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'numeric',
                'min:1',
                'max:6',
                function ($attribute, $value, $fail) {
                    if ($this->validationAulas($this->ng . '' . $value)) {
                        return $fail('El nombre del Salón esta duplicado.');
                    }
                },
            ],
            'grade' => 'required|numeric|min:0|max:11'
        ]);
        return $validator;
    }
}
