@extends('layouts.autentifica')

@section('content')


<section class="login-content">
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fa fa-check-circle"></i>
            <span>
                <strong>{{ Session::get('success') }}</strong>
            </span>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        </div>
    @endif
    @if (Session::has('fail'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <i class="fa fa-check-circle"></i>
          <span>
              <strong>{{ Session::get('fail') }}</strong>
          </span>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
    @endif
    <div class="logo">
        <h1>Imobiliaria</h1>
    </div>
    <div class="login-box">

        <form class="login-form" method="POST" action="{{ url('/login') }}">

            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>Acessar Sistema</h3>
            <div class="form-group">
                <label for="email" class="control-label">E-mail</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" id="email" name="email"
                    placeholder="Email" autofocus>
                @error('email')
                <div class="invalid-feedback">
                    <span><strong>{{ $message }}</strong></span>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="password" class="control-label">Senha</label>
                <input class="form-control  @error('password') is-invalid @enderror" type="password" id="password"
                    name="password" placeholder="Password">
                @error('password')
                <div class="invalid-feedback">
                    <span><strong>{{ $message }}</strong></span>
                </div>
                @enderror
            </div>
            <div class="form-group">
                <div class="utility">
                <p class="semibold-text mb-2"><a href="{{ url('/usuario/mailpage')}}">Recuperar Senha?</a></p>
                    <p class="semibold-text mb-2"><a href="{{ url('/registrar') }}">Registrar-se ?</a></p>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block"><i class="fa fa-sign-in fa-lg fa-fw"></i>Acessar</button>
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" id="checkRememberMe" name="checkRememberMe"><span
                                class="label-text">Mantenha-se conectado</span>
                        </label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
