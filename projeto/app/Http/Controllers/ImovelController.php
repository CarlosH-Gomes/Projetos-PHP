<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imovel;
use App\Locador;
use App\Cidade;
use Carbon\Carbon;
use App\Http\Requests\ImovelRequest;

class ImovelController extends Controller
{
    private $repository;
    private $request;

    public function __construct(Imovel $imovel, Request $request)
    {
        $this->repository = $imovel;
        $this->request = $request;
    }

    public function index()
    {
        //$registros = Locador::paginate(10);
        $registros = $this->repository->paginate(10);
        return view('imovel.index', [
            'registros' => $registros,
        ]);
    }

    public function search(Request $request)
    {
        
        $filters = $request->all();
        $registros = $this->repository->search($request->nome);
        return view('imovel.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new()
    {
        $cidades = Cidade::all();
        $locadores = Locador::all();
        return view('imovel.incluir',[
            'locadores' => $locadores,
            'cidades' => $cidades,
        ]);
    }
    public function create(ImovelRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        return redirect()->route('imovel.listar')->with('success', 'Registro incluido com sucesso');
    }
    public function edit($id)
    {
        $cidades = Cidade::all();
        $locadores = Locador::all();
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('imovel.alterar',[
            'registro'=>$registro,
            'locadores' => $locadores,
            'cidades' => $cidades,
        ]);
    }

    public function save(ImovelRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
       
      //  $this->repository->update($data);
        $registro->update($data);
        return redirect()->route('imovel.listar')->with('success', 'Registro alterado com sucesso');
    }

    public function delete($id)
    {
        $cidades = Cidade::all();
        $locadores = Locador::all();
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('imovel.excluir',[
            'registro'=>$registro,
            'locadores' => $locadores,
            'cidades' => $cidades,
        ]);
    }

    public function excluir($id){
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('imovel.listar')->with('success', 'Registro excluido com sucesso');
    }

    public function show($id)
    {   
        $cidades = Cidade::all();
        $locadores = Locador::all();
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('imovel.consultar',[
            'registro'=>$registro,
            'locadores' => $locadores,
            'cidades' => $cidades,
        ]);
    }

}
