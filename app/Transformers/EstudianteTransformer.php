<?php

namespace Ngsoft\Transformers;

use League\Fractal\TransformerAbstract;
use Ngsoft\Asignacion;
use Ngsoft\Estudiante;
use Ngsoft\Periodo;
class EstudianteTransformer extends TransformerAbstract
{
    protected  $availableIncludes = ['notas','inasistencias'];
    protected  $defaultIncludes = ['notas','inasistencias'];
    /**
     * @param \Ngsoft\Estudiante $estudiante
     * @return array
     */
    protected $asignatura;
    protected $periodo;
    protected $asignacion;
    protected $logros;


    /**
     * EstudianteTransformer constructor.
     * @param Asignacion $asignacion
     * @param Periodo $periodo
     * @param $logros
     */
    public function __construct (Asignacion $asignacion, Periodo $periodo, $logros)
    {
        $this->asignatura = $asignacion->asignatura->id;
        $this->asignacion = $asignacion->id;
        $this->periodo = $periodo->id;
        $this->logros = $logros;
    }

    public function transform(Estudiante $estudiante)
    {
        return [
            'estudiante_id' => (int) $estudiante->id,
            'asignacion_id' => (int) $this->asignacion,
            'periodo_id' => (int) $this->periodo,
            'name'    => $estudiante->apellido_name
        ];
    }
    public function includeNotas(Estudiante $estudiante)
    {
        $notas =  $estudiante->currentNotas($this->logros);
        return $this->collection($notas, new NotaTransformer);
    }
    public function includeInasistencias(Estudiante $estudiante)
    {
        $inasistencias =  $estudiante->currentInasistencias($this->asignatura,$this->periodo);
        return $this->collection($inasistencias, new InasistenciaTransformer);
    }
}
