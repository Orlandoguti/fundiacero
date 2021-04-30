@extends('auth.contenido')
@section('login')
    

        <div class="login-wrap cover">
          <div class="container-login">
          <p class="text-center" style="font-size: 80px;">
            <i class="zmdi zmdi-account-circle"></i>
          </p>
          <p class="text-center text-condensedLight">Iniciar Sesion Fundiacero</p>
          <form class="form-horizontal was-validated" method="POST" action="{{ route('login')}}">
          {{ csrf_field() }}
              <div class="card-body text-center">
                
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label form-group mb-3{{$errors->has('usuario' ? 'is-invalid' : '')}}">
                <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="mdl-textfield__input" require/>
                <label class="mdl-textfield__label">Usuario</label>
                {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label{{$errors->has('password' ? 'is-invalid' : '')}}">
                <input type="password" name="password" id="password" class="mdl-textfield__input" >
                <label class="mdl-textfield__label" for="userName">Contraseña</label>
                {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="row" style="place-content: center;">
                <div class="col-6">
                  <button type="submit" class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; margin: 0 auto; display: block;">Acceder</button>
                </div>
              </div>
            </div>
          </form>
          </div>
        </div>

  @endsection
