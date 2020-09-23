@include('layouts.validacao')

<div>
<div class="container px-1 px-md-1 px-lg-1">
    <div class="gutter-condensed gutter-lg flex-column flex-md-row d-flex">
        <div class="flex-shrink-0 col-1 col-md-4 mb-2 mb-md-5">
                <div class="clearfix d-flex flex-items-center ">
                    <div class="mt-2">
                        <div class="position d-inline-block col-12 col-md-12 mr-3 mr-md-0 flex-shrink-0"
                        style="z-index:4;">
                                <a itemprop="image" href=""><img style="height:auto;" alt="Avatar" width="260"
                                height="260" class="avatar avatar-user width-full border bg-white"
                                src="/imagem/icone.jpeg" /></a>
                                <div class="mt-1 flex-items-center" style="padding-left: 60px;">
                                    <label class="btn btn-primary" for="imgPerfil"><i class="fa fa-cloud-upload" aria-hidden="true"></i></label>
                                    <input id="imgPerfil" class="input_foto_perfil" hidden='true' type="file">
                                    <label class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></label>
                                </div>
                    </div> 
                    </div>
                </div>
          
        </div>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="name" class="control-label">Nome:</label>
             <input type="text"
                    name="name" 
                    id="name" 	
                    value="{{ isset( $registro->name) ? $registro->name : '' }}"
                    class="form-control @error('name') is-invalid @enderror"/>
            @error('name')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="email" class="control-label">Email:</label>
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
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="password" class="control-label">password:</label>
             <input type="password"
                    name="password" 
                    id="password" 	
                    value="{{ isset( $registro->password) ? $registro->Email : '' }}"
                    class="form-control @error('password') is-invalid @enderror"/>
            @error('password')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <label for="passwordconfirm" class="control-label">password-confirm:</label>
             <input type="password"
                    name="passwordconfirm" 
                    id="passwordconfirm" 	
                    value="{{ isset( $registro->passwordconfirm) ? $registro->passwordconfirm : '' }}"
                    class="form-control @error('passwordconfirm') is-invalid @enderror"/>
            @error('passwordconfirm')
            <div class="invalid-feedback">
                <span><strong>{{ $message }}</strong></span>
            </div>
            @enderror
        </div>
    </div>
    
</div>
  
   
</div>