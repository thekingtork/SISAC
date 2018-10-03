<?php

use ATS\Grupo;

/**
 * Retorna un pluck de todos los grupos registrados
 * @return \Illuminate\Support\Collection
 */
function grupos_pluck (){
    $_grupos = Grupo::with('grado')->get();
    $group = collect();
    foreach ($_grupos as $grupo){
        $group->push([
            'id' => $grupo->id,
            'name' => $grupo->name_aula,
            'grado' => $grupo->grado->numero,
        ]);
    }
    return  $group->sortBy('grado')->pluck('name','id');
}

/**
 * Retorna un valor booleano si existe una asignacion activa
 * @param $docente_id
 * @param $asignatura_id
 * @param $grado_id
 * @return bool
 */
function if_exist_asignacion($docente_id, $asignatura_id, $grado_id){
    $asignaciones = \ATS\Asignacion::where('docente_id','=',$docente_id)->where('asignatura_id','=',$asignatura_id)->with('grupo.grado')->get();
    $found = false;
    foreach ($asignaciones as $asignacion){
        if ($asignacion->grupo->grado->id === $grado_id){
            $found = true;
        }
    }
    return $found;
}


function currentUser(){
    return auth()->user();
}

function currentPerfil(){
    return auth()->user()->type;
}
function classAcordeon($data){
    switch ($data){
        case '1':
            return 'collapse2PrimaryOne';
        break;
        case '2':
            return 'collapse2PrimaryTwo';
        break;
        case '3':
            return 'collapse2PrimaryThree';
        break;
        case '4':
            return 'collapse2PrimaryFour';
        break;
        default:
            break;
    }
}



/**
 * @param $score
 * @return string
 */
function indicador($score){
    if ($score === ""){
        return "";
    }
    if ($score < 6){
        return 'Bajo';
    }
    if ($score >= 6 && $score < 8){
        return 'Básico';
    }
    if ($score >= 8 && $score < 9.5){
        return 'Alto';
    }
    if ($score >= 9.5 && $score <= 10){
        return 'Superior';
    }
}
