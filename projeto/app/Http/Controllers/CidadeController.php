<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cidade;
use Carbon\Carbon;
use App\Http\Requests\CidadeRequest;

class CidadeController extends Controller
{
    private $repository;

    public function __construct(Cidade $cidade)
    {
        $this->middleware('auth');
        $this->repository = $cidade;
    }

    public function index()
    {
        //$registros = Locador::paginate(10);
        $registros = $this->repository->paginate(10);
        return view('cidade.index', [
            'registros' => $registros,
        ]);
    }

    public function search(Request $request)
    {

        $filters = $request->all();
        $registros = $this->repository->search($request->nome);
        return view('cidade.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new()
    {
        return view('cidade.incluir');
    }
    public function create(CidadeRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('cidade.listar')->with('success', 'Registro incluido com sucesso');
    }
    public function edit($id)
    {
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('cidade.alterar',[
            'registro'=>$registro,
        ]);
    }

    public function save(CidadeRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
        $data['Data_Nasci'] = Carbon::createFromFormat('d/m/Y', $request['Data_Nasci'])->format('Y-m-d');
      //  $this->repository->update($data);
        $registro->update($data);
        return redirect()->route('cidade.listar')->with('success', 'Registro alterado com sucesso');
    }

    public function delete($id)
    {
        
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('cidade.excluir',[
            'registro'=>$registro,
        ]);
    }

    public function excluir($id){
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('cidade.listar')->with('success', 'Registro excluido com sucesso');
    }

    public function show($id)
    {   
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('cidade.consultar',[
            'registro'=>$registro,
        ]);
    }
}
