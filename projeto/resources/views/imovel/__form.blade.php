@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="Rua" class="control-label">Rua:</label>
             <input type="text"
                    name="Rua" 
                    id="Rua" 	
                    value="{{ isset( $registro->Rua) ? $registro->Rua : '' }}"
                    class="form-control @error('Rua') is-invalid @enderror"/>
            @error('Rua')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Bairro" class="control-label">Bairro:</label>
             <input type="text"
                    name="Bairro" 
                    id="Bairro" 	
                    value="{{ isset( $registro->Bairro) ? $registro->Bairro : '' }}"
                    class="form-control @error('Bairro') is-invalid @enderror"/>
            @error('Bairro')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="CEP" class="control-label">CEP:</label>
             <input type="text"
                    name="CEP" 
                    id="CEP" 	
                    value="{{ isset( $registro->CEP) ? $registro->CEP : '' }}"
                    class="form-control @error('CEP') is-invalid @enderror"/>
            @error('CEP')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Numero" class="control-label">Numero:</label>
             <input type="text"
                    name="Numero" 
                    id="Numero" 	
                    value="{{ isset( $registro->Numero) ? $registro->Numero : '' }}"
                    class="form-control @error('Numero') is-invalid @enderror"/>
            @error('Numero')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Complemento" class="control-label">Complemento:</label>
             <input type="text"
                    name="Complemento" 
                    id="Complemento" 	
                    value="{{ isset( $registro->Complemento) ?$registro->Complemento : '' }}"
                    class="form-control @error('Complemento') is-invalid @enderror"/>
            @error('Complemento')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Valor" class="control-label">Valor:</label>
             <input type="text"
                    name="Valor" 
                    id="Valor" 	
                    value="{{ isset( $registro->Valor) ? $registro->Valor : '' }}"
                    class="form-control @error('Valor') is-invalid @enderror"/>
            @error('Valor')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="locador_id" class="control-label">Proprietario:</label>
             <select type="text"
                    name="locador_id" 
                    id="locador_id" 	
                    class="form-control @error('locador_id') is-invalid @enderror">
                    @if(isset( $registro->locador_id))    
                         
                            @foreach ($locadores   as $locador )
                                <option   value="{{$locador->id}}" {{$locador->id == $registro->locador_id   ? 'selected' : ''}} >{{$locador->nome}}</option>
                            @endforeach
                    @else 
                        <option   value=''>Selecione um proprietario</option>
                         @foreach ($locadores   as $locador ) 
                            <option   value="{{$locador->id}}"}} >{{$locador->nome}}</option>
                        @endforeach
                    @endif
            </select>
            @error('locador_id')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Tipo" class="control-label">Tipo:</label>
             <select type="text"
                    name="Tipo" 
                    id="Tipo" 	
                    class="form-control @error('Tipo') is-invalid @enderror">
                    @if(isset( $registro->Tipo))
                        <option value="">Selecione o tipo de imovel</option>
                        <option value="Casa" {{ $registro->Tipo === 'Casa' ? 'selected' : ''}}>Casa</option>
                        <option value="Apartamento" {{ $registro->Tipo === 'Apartamento' ? 'selected' : ''}}>Apartamento</option>
                        <option value="Comercio" {{ $registro->Tipo === 'Comercio' ? 'selected' : ''}}>Comercio</option>
                    @else 
                        <option value="">Selecione o Tipo</option>
                        <option value="Casa">Casa</option>
                        <option value="Apartamento">Apartamento</option>
                        <option value="Comercio">Comercio</option>
                    @endif
                </select>
            @error('Tipo')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Estilo" class="control-label">Venda|Aluguel:</label>
             <select type="text"
                    name="Estilo" 
                    id="Estilo" 	
                    class="form-control @error('Estilo') is-invalid @enderror">
                    @if(isset( $registro->Estilo))
                        <option value="">Selecione o Estilo</option>
                        <option value="Venda" {{ $registro->Estilo === 'Venda' ? 'selected' : ''}}>Venda</option>
                        <option value="Aluguel" {{ $registro->Estilo === 'Aluguel' ? 'selected' : ''}}>Aluguel</option>
                    @else 
                        <option value="">Selecione o Estilo</option>
                        <option value="Venda">Venda</option>
                        <option value="Aluguel">Aluguel</option>
                    @endif
                </select>
            @error('Estilo')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="cidade_imovel_id" class="control-label">Cidade:</label>
             <select type="text"
                    name="cidade_imovel_id" 
                    id="cidade_imovel_id" 	
                    class="form-control @error('cidade_imovel_id') is-invalid @enderror">
                    @if(isset( $registro->cidade_imovel_id))    
                         
                            @foreach ($cidades   as $cidade )
                                <option   value="{{$cidade->id}}" {{$cidade->id == $registro->cidade_imovel_id   ? 'selected' : ''}} >{{$cidade->Nome}}</option>
                            @endforeach
                    @else 
                        <option   value=''>Selecione Cidade</option>
                         @foreach ($cidades   as $cidade ) 
                            <option   value="{{$cidade->id}}"}} >{{$cidade->Nome}}</option>
                        @endforeach
                    @endif
            </select>
            @error('cidade_imovel_id')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
</div>