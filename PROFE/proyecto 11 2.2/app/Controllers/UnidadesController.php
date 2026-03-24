<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\UnidadesModel;

class UnidadesController extends BaseController
{
    
    protected $unidades;

    public function __construct()
    {
        $this->unidades = new UnidadesModel();
    }// final construct

    public function index($estado = 1): string
    {
        $unidades = $this->unidades->where('estado', $estado)->findAll();
        $datos=[
            'titulo' => 'listado de unidades',
            'unidades' => $unidades
        ];
        return view('header')
        .view('unidades/lista', $datos)
        .view('footer');

    }// final del index

    public function registrar(){
        $datos=[
            'titulo' => 'Registrar Unidades'
        ];

        return view('header')
        .view('unidades/registrar', $datos)
        .view('footer');

    } // final registrar

    public function guardar(){
        $validacion = \Config\Services::validation();
        $reglas = [
            'nombre' => 'required|alpha_space|min_length[3]|max_length[50]',
            'siglas' => 'required|alpha|min_length[1]|max_length[5]|is_unique[unidades.siglas]'
        ];

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('validation',$validacion);
        }

        $this->unidades->save([
            'nombre' => $this->request->getPost('nombre'),
            'siglas' => $this->request->getPost('siglas')
        ]);

        return redirect()->to(site_url('unidades'));



    } // final guardar

    public function editar($id){
        $unidad = $this->unidades->find($id);
        $datos=[
            'titulo' => 'Editar Unidades',
            'unidad' => $unidad
        ];

        return view('header')
        .view('unidades/editar', $datos)
        .view('footer');

    } // final editar

    public function modificar(){
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');
        $siglas = $this->request->getPost('siglas');

        $unidadmodel = new UnidadesModel();
        $unidad = $unidadmodel->find($id);

        $validacion = \Config\Services::validation();
        $reglas = [
            'nombre' => [
                'rules' => "required|alpha_space|min_length[3]|max_length[50]"
                .($nombre !== $unidad['nombre'] ? "|is_unique[unidades.nombre]" : ""),
                'errors' =>[
                    'required'=> 'El campo nombre es Obligatorio' ,
                    'is_unique' => 'El nombre ingresado ya existe en la base de datos'
                ]
                
            ],
            'siglas' => [
                'rules' => "required|alpha|min_length[1]|max_length[5]"
                .($siglas !== $unidad['siglas'] ? "|is_unique[unidades.siglas]" : ""),
                'errors' =>[
                    'required'=> 'El campo siglas es Obligatorio' ,
                    'is_unique' => 'Las siglas ingresadas ya existen en la base de datos'
                ]
                
            ],
        ]; //final reglas

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('validation',$validacion);
        }

        $this->unidades->update($id,[
            'nombre' => $this->request->getPost('nombre'),
            'siglas' => $this->request->getPost('siglas')
        ]);

        return redirect()->to(site_url('unidades'));


    }
    public function eliminar($id){
        $this->unidades->update($id,[
            'estado' => 0
        ]);

        return redirect()->to(site_url('unidades'));
    }

    public function eliminadas(){
        $unidades = $this->unidades->where('estado', 0)->findAll();
        $datos=[
            'titulo' => 'Unidades Eliminadas',
            'unidades' => $unidades
        ];
        return view('header')
        .view('unidades/eliminado', $datos)
        .view('footer');
    }

    public function activar($id){
        $this->unidades->update($id,[
            'estado' => 1
        ]);

        return redirect()->to(site_url('unidades/eliminadas'));
    }

}// Final del controlador
