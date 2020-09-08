@include('layouts.validacao')
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="Nome" class="control-label">Nome:</label>
             <input type="text"
                    name="Nome" 
                    id="Nome" 	
                    value="{{ isset( $registro->Nome) ? $registro->Nome : '' }}"
                    class="form-control @error('Nome') is-invalid @enderror"/>
            @error('Nome')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
            <label for="Estado" class="control-label">Estado:</label>
             <input type="text"
                    name="Estado" 
                    id="Estado" 	
                    value="{{ isset( $registro->Estado) ? $registro->Estado : '' }}"
                    class="form-control @error('Estado') is-invalid @enderror"/>
            @error('Estado')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
   
</div>