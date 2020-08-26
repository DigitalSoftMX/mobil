@extends('layouts.app', ['activePage' => 'Fleteras', 'titlePage' => __('Gestión de Fleteras')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 mx-auto d-block mt-3">
        <form action="{{ route('registro_fleteras.store') }}" autocomplete="off" class="form-horizontal" enctype="multipart/form-data" method="post">
          @csrf
          @method('post')
          <div class="card ">

            <div class="card-header card-header-primary">
              <h4 class="card-title">
                  {{ __('Agregar Fletera') }}
              </h4>
              <p class="card-category"></p>
            </div>

            <div class="card-body">
              <div class="row mb-4">
                <div class="col-12 text-left">
                  <a href="{{ route('registro_fleteras.index') }}" class="btn btn-social btn-just-icon btn-primary" title="Regresar a la lista">
                      <i class="material-icons">arrow_back_ios</i>
                  </a>
                </div>
              </div>
              <div class="row">
                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mt-5 col-md-4">
                  <label for="name" class="mt-2">{{ __('Nombre de la fletera') }}</label>
                  <input aria-describedby="nameHelp" aria-required="true" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} mt-4"  id="input-name" name="name"  type="text" value="{{ old('name')}}">
                    @if ($errors->has('name'))
                    <span class="error text-danger" for="input-name" id="name-error">
                      {{ $errors->first('name') }}
                    </span>
                    @endif
                  </input>
                </div>

                <div class="form-group{{ $errors->has('rfc') ? ' has-danger' : '' }} mt-5 col-md-4">
                  <label for="rfc" class="mt-2">{{ __('RFC') }}</label>
                  <input aria-describedby="rfcHelp" aria-required="true" class="form-control{{ $errors->has('rfc') ? ' is-invalid' : '' }} mt-4"  id="input-rfc" name="rfc"  type="text" value="{{ old('rfc')}}">
                    @if ($errors->has('rfc'))
                    <span class="error text-danger" for="input-rfc" id="rfc-error">
                      {{ $errors->first('rfc') }}
                    </span>
                    @endif
                  </input>
                </div>

                <div class="form-group{{ $errors->has('cre') ? ' has-danger' : '' }} mt-5 col-md-4">
                  <label for="cre" class="mt-2">{{ __('CRE') }}</label>
                  <input aria-describedby="creHelp" aria-required="true" class="form-control{{ $errors->has('cre') ? ' is-invalid' : '' }} mt-4"  id="input-cre" name="cre"  type="text" value="{{ old('cre')}}">
                    @if ($errors->has('cre'))
                    <span class="error text-danger" for="input-cre" id="cre-error">
                      {{ $errors->first('cre') }}
                    </span>
                    @endif
                  </input>
                </div>


              </div>

              <div class="row">
                 <div class="form-group{{ $errors->has('telefono') ? ' has-danger' : '' }} mt-5 col-md-4">
                  <label for="telefono" class="mt-2">{{ __('telefono') }}</label>
                  <input aria-describedby="telefonoHelp" aria-required="true" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }} mt-4"  id="input-telefono" name="telefono"  type="text" value="{{ old('telefono')}}">
                    @if ($errors->has('telefono'))
                    <span class="error text-danger" for="input-telefono" id="telefono-error">
                      {{ $errors->first('telefono') }}
                    </span>
                    @endif
                  </input>
                </div>

                <div class="form-group{{ $errors->has('direccion') ? ' has-danger' : '' }} mt-5 col-md-4">
                  <label for="direccion" class="mt-2">{{ __('Dirección') }}</label>
                  <input aria-describedby="direccionHelp" aria-required="true" class="form-control{{ $errors->has('direccion') ? ' is-invalid' : '' }} mt-4"  id="input-direccion" name="direccion"  type="text" value="{{ old('direccion')}}">
                    @if ($errors->has('direccion'))
                    <span class="error text-danger" for="input-direccion" id="name-error">
                      {{ $errors->first('direccion') }}
                    </span>
                    @endif
                  </input>
                </div>

                <div class="form-group{{ $errors->has('contacto') ? ' has-danger' : '' }} mt-5 col-md-4">
                  <label for="contacto" class="mt-2">{{ __('Contacto') }}</label>
                  <input aria-describedby="contactoHelp" aria-required="true" class="form-control{{ $errors->has('contacto') ? ' is-invalid' : '' }} mt-4"  id="input-contacto" name="contacto"  type="text" value="{{ old('contacto')}}">
                    @if ($errors->has('contacto'))
                    <span class="error text-danger" for="input-contacto" id="contacto-error">
                      {{ $errors->first('contacto') }}
                    </span>
                    @endif
                  </input>
                </div>
              </div>
	            

              <div class="card-footer ml-auto mr-auto">
                <button class="btn btn-primary" type="submit">
                    {{ __('Guardar') }}
                </button>
              </div>
           </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<script>
    $(document).ready(function(){
    iniciar_selector_de_archivos();
  });
</script>
@endpush
