<?php

namespace Ngsoft\Http\Requests;

use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Routing\Route;
use Illuminate\Validation\Rule;
use Ngsoft\Logro;
use Ngsoft\Periodo;
use Ngsoft\Rules\CountCodeLogro;
use Ngsoft\Rules\ValidatePeriodo;

class UpdateLogroRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $route;
    private $logro;
    protected $redirect; // A simple URL. ex: google.com
    protected $redirectRoute; // A route name to redirect to.
    protected $redirectAction; // A controller action to redirect to.
    public function __construct (Route $route)
    {
        $this->route = $route;
    }

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $this->logro = Logro::find($this->route->parameter('logro'));
        if (currentPerfil() ==='docente'){
            return [
                'code' => new CountCodeLogro($this->request),
                'indicador' => 'required|in:bajo,basico,alto,superior',
                'description'  => 'required|min:3|string|max:400',
                'category'  => 'required|in:cognitivo,procedimental,actitudinal',
                'grade'  =>'required|numeric',
                'asignatura_id'=>'required|numeric',
                'docente_id'=>'required|numeric',
                'periodo_id'=> ['required','numeric', new ValidatePeriodo()]
            ];
        };
        return [
            'code' => Rule::unique('logros')->ignore($this->logro->code, 'code'),
            'indicador' => 'required|in:bajo,basico,alto,superior',
            'description'  => 'required|min:3|string|max:400',
            'category'  => 'required|in:cognitivo,procedimental,actitudinal',
            'grade'  =>'required|numeric',
            'asignatura_id'=>'required|numeric',
            'docente_id'=>'required|numeric',
            'periodo_id'=>'required|numeric',
        ];
    }
}
