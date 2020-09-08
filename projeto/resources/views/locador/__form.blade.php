@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="nome" class="control-label">Nome:</label>
             <input type="text"
                    name="nome" 
                    id="nome" 	
                    value="{{ isset( $registro->nome) ? $registro->nome : '' }}"
                    class="form-control @error('nome') is-invalid @enderror"/>
            @error('nome')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="CPF" class="control-label">CPF:</label>
             <input type="text"
                    name="CPF" 
                    id="CPF" 	
                    value="{{ isset( $registro->CPF) ? $registro->CPF : '' }}"
                    class="form-control @error('CPF') is-invalid @enderror"/>
            @error('CPF')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="RG" class="control-label">RG:</label>
             <input type="text"
                    name="RG" 
                    id="RG" 	
                    value="{{ isset( $registro->RG) ? $registro->RG : '' }}"
                    class="form-control @error('RG') is-invalid @enderror"/>
            @error('RG')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Telefone" class="control-label">Telefone:</label>
             <input type="text"
                    name="Telefone" 
                    id="Telefone" 	
                    value="{{ isset( $registro->Telefone) ? $registro->Telefone : '' }}"
                    class="form-control @error('Telefone') is-invalid @enderror"/>
            @error('Telefone')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Data_Nasci" class="control-label">Data de Nascimento:</label>
             <input type="text"
                    name="Data_Nasci" 
                    id="Data_Nasci" 	
                    value="{{ isset( $registro->Data_Nasci) ? date('d/m/Y', strtotime($registro->Data_Nasci)) : '' }}"
                    class="form-control @error('Data_Nasci') is-invalid @enderror"/>
            @error('Data_Nasci')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="email" class="control-label">E-mail:</label>
             <input type="text"
                    name="email" 
                    id="email" 	
                    value="{{ isset( $registro->email) ? $registro->email : '' }}"
                    class="form-control @error('email') is-invalid @enderror"/>
            @error('email')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="sexo" class="control-label">Sexo:</label>
             <select type="text"
                    name="sexo" 
                    id="sexo" 	
                    class="form-control @error('sexo') is-invalid @enderror">
                    @if(isset( $registro->sexo))
                        <option value="">Selecione o Sexo</option>
                        <option value="F" {{ $registro->sexo === 'F' ? 'selected' : ''}}>Feminino</option>
                        <option value="M" {{ $registro->sexo === 'M' ? 'selected' : ''}}>Masculino</option>
                    @else 
                        <option value="">Selecione o Sexo</option>
                        <option value="F">Feminino</option>
                        <option value="M">Masculino</option>
                    @endif
                </select>
            @error('sexo')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="cidade_locador_id" class="control-label">Cidade:</label>
             <select type="text"
                    name="cidade_locador_id" 
                    id="cidade_locador_id" 	
                    class="form-control @error('cidade_locador_id') is-invalid @enderror">
                    @if(isset( $registro->cidade_locador_id))    
                         
                            @foreach ($cidades   as $cidade )
                                <option   value="{{$cidade->id}}" {{$cidade->id == $registro->cidade_locador_id   ? 'selected' : ''}} >{{$cidade->Nome}}</option>
                            @endforeach
                    @else 
                        <option   value=''>Selecione a Cidade</option>
                         @foreach ($cidades   as $cidade ) 
                            <option   value="{{$cidade->id}}"}} >{{$cidade->Nome}}</option>
                        @endforeach
                    @endif
            </select>
            @error('cidade_locador_id')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
</div>