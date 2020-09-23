<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use Illuminate\Http\Request;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;

class UsuarioController extends Controller
{
    private $repository;

    use RegistersUsers;
    public function __construct(User $usuario)
    {
        $this->middleware('auth');
        $this->repository = $usuario;
    }

    
    public function index()
    {
        //$registros = Locador::paginate(10);
        $registros = $this->repository->paginate(10);
        return view('usuario.index', [
            'registros' => $registros,
        ]);
    }

    public function search(Request $request)
    {

        $filters = $request->all();
        $registros = $this->repository->search($request->nome);
        return view('usuario.index', [
            'registros' => $registros,
            'filters' => $filters,
        ]);
    }

    public function new()
    {
        return view('usuario.incluir');
    }
    public function create(UsuarioRequest $request)
    {
        $data = $request->all();
        $this->repository->create($data);
        
        return redirect()->route('usuario.listar')->with('success', 'Registro incluido com sucesso');
    }
    public function edit($id)
    {
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('usuario.alterar',[
            'registro'=>$registro,
        ]);
    }

    public function save(UsuarioRequest $request, $id)
    {
        $data = $request->all();

        $registro = $this->repository->find($id);
        
       
      //  $this->repository->update($data);
        $registro->update($data);
        return redirect()->route('usuario.listar')->with('success', 'Registro alterado com sucesso');
    }

    public function delete($id)
    {
        
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('usuario.excluir',[
            'registro'=>$registro,
        ]);
    }

    public function excluir($id){
        $registro = $this->repository->find($id);
        $registro->delete();
        return redirect()->route('usuario.listar')->with('success', 'Registro excluido com sucesso');
    }

    public function show($id)
    {   
        $registro = $this->repository->find($id);
        if(!$registro){
            return redirect()->back();
        }
        return view('usuario.consultar',[
            'registro'=>$registro,
        ]);
    }
}
