<?php

namespace ATS\Http\Controllers\Docente;


use ATS\Http\Controllers\Controller;
use ATS\Http\Requests\CreateIndicadorRequest;
use ATS\Http\Requests\UpdateIndicadorRequest;
use ATS\Model\Anio;
use ATS\Model\Docente;
use ATS\Model\Indicador;
use ATS\Model\Periodo;
use ATS\Transformers\IndicadorTransformer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndicadorController extends Controller
{
    /**
     * @var Docente
     */
    private $docente;

    public function __construct (Request $request)
    {
        $this->middleware(function ($request, $next) {
            $this->docente= Auth::user()->docente;
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->docente = Auth::user()->docente;
        $this->docente->load(['indicadores.periodo','indicadores.grado','indicadores.asignatura','indicadores.docente']);
        $indicadores = $this->docente->indicadores;
        if ($request->ajax()){
            return datatables()->collection($indicadores)->setTransformer(new IndicadorTransformer())->smart(true)->toJson();
        }
        return view('docente.indicadores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->docente->load(['asignaciones.asignatura','asignaciones.grupo.grado',]);
        $asg = collect();
        $gds = collect();
        foreach ($this->docente->asignaciones as $asignacion){
            $asg->push($asignacion->asignatura);
            $gds->push($asignacion->grupo->grado);
        }
        $date = Carbon::now();
        $anio = Anio::where('name',$date->year)->with('periodos')->first();
        $grados = $gds->unique()->sortBy('numero')->pluck('name','id');
        $asignaturas = $asg->unique()->sortBy('name')->pluck('name','id');
        $periodos = $anio->periodos->pluck('name','id');
        $docente = $this->docente;
        return view('docente.indicadores.ajax.create',compact('grados','asignaturas','periodos','docente'));
    }


    public function store(CreateIndicadorRequest $request)
    {
        try {
            Indicador::create($request->all());
        }
        catch (\Exception $e) {
            $data = array(['msg'=>'El indicador presenta duplicidad','status'=>true]); ;
            return view('docente.indicadores.index',compact('data'));
        }
        return redirect()->route('docente.indicadors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function show(Indicador $indicador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ATS\Indicador  $indicador
     * @return \Illuminate\Http\Response
     */
    public function edit(Indicador $indicador)
    {
        $asg = collect();
        $gds = collect();
        foreach ($this->docente->asignaciones as $asignacion){
            $asg->push($asignacion->asignatura);
            $gds->push($asignacion->grupo->grado);
        }
        $grados = $gds->unique()->sortBy('numero')->pluck('name','id');
        $asignaturas = $asg->unique()->sortBy('name')->pluck('name','id');
        $periodos = Periodo::pluck('name','id');
        $docente = $this->docente;
        return view('docente.indicadores.ajax.edit',compact('grados','asignaturas','periodos','docente','indicador'));
    }

    /**
     * @param UpdateIndicadorRequest $request
     * @param Indicador $indicador
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateIndicadorRequest $request, Indicador $indicador) {
        try {
            $indicador->update($request->all());
        }
        catch (\Exception $e) {
            $data = array(['msg'=>'El indicador presenta duplicidad','status'=>true]); ;
            return view('docente.indicadores.index',compact('data'));
        }
        return redirect()->route('docente.indicadors.index');
    }

    /**
     * @param Indicador $indicador
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Indicador $indicador)
    {
        $indicador->delete();
        return redirect()->route('docente.indicadors.index');
    }
}
