<?php

namespace App\Http\Controllers;

use App\Http\Requests\LocadorRequest;
use Illuminate\Http\Request;
use App\Locador;
use App\Cidade;
use Carbon\Carbon;

class LocadorController extends Controller
{

    private $repository;

    public function __construct(Locador $locador)
    {
        $this->repository = $locador;
    }

    public function index()
    {
        //$registros = Locador::paginate(10);
        $registros = $this->repository->paginate(10);
        return view('locador.index', [
            'registros' => $registros,
        ]);
    }

    public function search(Request $request)
    {

        $filters = $request->all();
        $registros = $this->repository->search($request->nome);
        return view('locador.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new()
    {
        $cidades = Cidade::all();
        return view('locador.incluir',[
            'cidades' => $cidades,
        ]);
    }
    public function create(LocadorRequest $request)
    {
        $data = $request->all();
        $data['Data_Nasci'] = Carbon::createFromFormat('d/m/Y', $request['Data_Nasci'])->format('Y-m-d');
        $this->repository->create($data);
        return redirect()->route('locador.listar')->with('success', 'Registro incluido com sucesso');
    }
    public function edit($id)
    {
        $cidades = Cidade::all();
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('locador.alterar',[
            'registro'=>$registro,
            'cidades' => $cidades,
        ]);
    }

    public function save(LocadorRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
        $data['Data_Nasci'] = Carbon::createFromFormat('d/m/Y', $request['Data_Nasci'])->format('Y-m-d');
      //  $this->repository->update($data);
        $registro->update($data);
        return redirect()->route('locador.listar')->with('success', 'Registro alterado com sucesso');
    }

    public function delete($id)
    {
        $cidades = Cidade::all();
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('locador.excluir',[
            'registro'=>$registro,
            'cidades' => $cidades,
        ]);
    }

    public function excluir($id){
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('locador.listar')->with('success', 'Registro excluido com sucesso');
    }

    public function show($id)
    {   
        $cidades = Cidade::all();
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('locador.consultar',[
            'registro'=>$registro,
            'cidades' => $cidades,
        ]);
    }

    
}
