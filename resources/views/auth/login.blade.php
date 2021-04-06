@extends('auth.contenido')

@section('login')

<div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card-group mb-0">
          <div class="card p-4" style="background:#0000007d;">
          <form class="form-horizontal was-validated" method="POST" action="{{ route('login')}}">
          {{ csrf_field() }}
              <div class="card-body text-center">
              <div><img src="imagenes/fn.jpg"></div>
              <span class="divlinea"><i></i>_____________________________________________________________________________</span>
              <div class="form-group mb-4{{$errors->has('usuario' ? 'is-invalid' : '')}}">
              <span class="input-group-addon"><i class="icon-user"></i>&nbsp; Usuario:</span>
                <input type="text" value="{{old('usuario')}}" name="usuario" id="usuario" class="form-control-2" placeholder="Ingrese su Usuario....." >
                {!!$errors->first('usuario','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="form-group mb-4{{$errors->has('password' ? 'is-invalid' : '')}}">
                <span class="input-group-addon"><i class="icon-lock"></i>&nbsp; Password:</span>
                <input type="password" name="password" id="password" class="form-control-2" placeholder="Ingrese su Contraseña......">
                {!!$errors->first('password','<span class="invalid-feedback">:message</span>')!!}
              </div>
              <div class="row">
                <div class="col-6">
                  <button type="submit" class="btn botonlogin ">Acceder</button>
                </div>
              </div>
            </div>
          </form>
          </div>

        </div>
      </div>
    </div>
@endsection
