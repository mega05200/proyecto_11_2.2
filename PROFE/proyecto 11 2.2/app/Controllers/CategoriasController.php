<?php

namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\CategoriasModel;


class CategoriasController extends BaseController
{
    
    protected $categorias;

    public function __construct()
    {
        $this->categorias = new CategoriasModel();
    }// final construct

    public function index($estado = 1): string
    {
        $categorias = $this->categorias->where('estado', $estado)->findAll();
        $datos=[
            'titulo' => 'listado de categorias',
            'categorias' => $categorias
        ];
        return view('header')
        .view('categorias/lista', $datos)
        .view('footer');

    }// final del index

    public function registrar(){
        $datos=[
            'titulo' => 'Registrar Categorias'
        ];

        return view('header')
        .view('categorias/registrar', $datos)
        .view('footer');

    } // final registrar

    public function guardar(){
        $validacion = \Config\Services::validation();
        $reglas = [
            'nombre' => 'required|alpha_space|min_length[3]|max_length[50]|is_unique[categorias.nombre]'
        ];

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('validation',$validacion);
        }

        $this->categorias->save([
            'nombre' => $this->request->getPost('nombre')
        ]);

        return redirect()->to(site_url('categorias'));



    } // final guardar

    public function editar($id){
        $categoria = $this->categorias->find($id);
        $datos=[
            'titulo' => 'Editar Categorias',
            'categoria' => $categoria
        ];

        return view('header')
        .view('categorias/editar', $datos)
        .view('footer');

    } // final editar

    public function modificar(){
        $id = $this->request->getPost('id');
        $nombre = $this->request->getPost('nombre');

        $categoriamodel = new CategoriasModel();
        $categoria = $categoriamodel->find($id);

        $validacion = \Config\Services::validation();
        $reglas = [
            'nombre' => [
                'rules' => "required|alpha_space|min_length[3]|max_length[50]"
                .($nombre !== $categoria['nombre'] ? "|is_unique[categorias.nombre]" : ""),
                'errors' =>[
                    'required'=> 'El campo nombre es Obligatorio' ,
                    'is_unique' => 'El nombre ingresado ya existe en la base de datos'
                ]
                
            ]
        ]; //final reglas

        if(!$this->validate($reglas)){
            return redirect()->back()->withInput()->with('validation',$validacion);
        }

        $this->categorias->update($id,[
            'nombre' => $this->request->getPost('nombre')
        ]);

        return redirect()->to(site_url('categorias'));


    }
    public function eliminar($id){
        $this->categorias->update($id,[
            'estado' => 0
        ]);

        return redirect()->to(site_url('categorias'));
    }

    public function eliminadas(){
        $categorias = $this->categorias->where('estado', 0)->findAll();
        $datos=[
            'titulo' => 'Categorias Eliminadas',
            'categorias' => $categorias
        ];
        return view('header')
        .view('categorias/eliminado', $datos)
        .view('footer');
    }

    public function activar($id){
        $this->categorias->update($id,[
            'estado' => 1
        ]);

        return redirect()->to(site_url('categorias/eliminadas'));
    }

}// Final del controlador