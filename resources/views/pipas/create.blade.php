@extends('layouts.app', ['activePage' => 'Fleteras', 'titlePage' => __('Gestión de las pipas')])

@section('content')
  <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 mx-auto d-block mt-3">
                <form action="{{ route('pipas.store') }}" autocomplete="off" class="form-horizontal" method="post">
                  @csrf
                  @method('post')
                    <div class="card ">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">
                                <a href="{{ route('pipas.index') }}"  title="Regresar a la lista">
                                  <i class="material-icons font-weight-normal">arrow_back_ios</i>
                                </a>
                                {{ __('Agregar Pipa') }}
                            </h4>
                            <p class="card-category">
                            </p>
                        </div>
                        <div class="card-body">
                            
                            <div class="row mt-3">

                              <div class="form-group{{ $errors->has('numero') ? ' has-danger' : '' }} col-sm-6">
                                <label for="numero">{{ __('Numero de Série') }}</label>
                                <input aria-describedby="numeroHelp" aria-required="true" class="form-control{{ $errors->has('numero') ? ' is-invalid' : '' }}" id="input-numero" name="numero" placeholder="Escribe un Número" type="text" value="{{ old('numero')}}">
                                  @if ($errors->has('numero'))
                                    <span class="error text-danger" for="input-numero" id="numero-error">
                                      {{ $errors->first('numero') }}
                                    </span>
                                  @endif
                                </input>
                              </div>

                              <div class="form-group{{ $errors->has('numero_economico') ? ' has-danger' : '' }} col-sm-6">
                                <label for="numero_economico">{{ __('Número Economico') }}</label>
                                <input aria-describedby="numero_economicoHelp" aria-required="true" class="form-control{{ $errors->has('numero_economico') ? ' is-invalid' : '' }}" id="input-numero_economico" name="numero_economico" placeholder="Escribe un el Número Economico" type="text" value="{{ old('numero_economico')}}">
                                  @if ($errors->has('numero_economico'))
                                    <span class="error text-danger" for="input-numero_economico" id="numero_economico-error">
                                      {{ $errors->first('numero_economico') }}
                                    </span>
                                  @endif
                                </input>
                              </div>

                            </div>
                            <div class="row mt-3">

                              <div class="form-group{{ $errors->has('capacidad') ? ' has-danger' : '' }} col-sm-6">
                                <label for="capacidad">{{ __('Capacidad (LTS)') }}</label>
                                <input aria-describedby="capacidadHelp" aria-required="true" class="form-control{{ $errors->has('capacidad') ? ' is-invalid' : '' }}" id="input-capacidad" name="capacidad"  type="number" value="{{ old('capacidad',1)}}">
                                  @if ($errors->has('capacidad'))
                                    <span class="error text-danger" for="input-capacidad" id="capacidad-error">
                                      {{ $errors->first('capacidad') }}
                                    </span>
                                  @endif
                                </input>
                              </div>

                              <div class="form-group{{ $errors->has('compartimentos') ? ' has-danger' : '' }} col-sm-6">
                                <label for="compartimentos">{{ __('Compartimentos') }}</label>
                                <input aria-describedby="compartimentosHelp" aria-required="true" class="form-control{{ $errors->has('compartimentos') ? ' is-invalid' : '' }}" id="input-compartimentos" name="compartimentos" type="number" min="1" max="2" value="{{ old('compartimentos',1)}}">
                                  @if ($errors->has('compartimentos'))
                                    <span class="error text-danger" for="input-compartimentos" id="compartimentos-error">
                                      {{ $errors->first('compartimentos') }}
                                    </span>
                                  @endif
                                </input>
                              </div>

                            </div>
                            <div class="row mb-3 mt-3">

                              <div class="form-group{{ $errors->has('capacidad_1') ? ' has-danger' : '' }} col-sm-6">
                                <label for="capacidad_1">{{ __('Capacidad compartimiento 1 (LTS)') }}</label>
                                <input aria-describedby="capacidad_1Help" aria-required="true" class="form-control{{ $errors->has('capacidad_1') ? ' is-invalid' : '' }}" id="input-capacidad_1" name="capacidad_1" type="number" value="{{ old('capacidad_1',1)}}">
                                  @if ($errors->has('capacidad_1'))
                                    <span class="error text-danger" for="input-capacidad_1" id="capacidad_1-error">
                                      {{ $errors->first('capacidad_1') }}
                                    </span>
                                  @endif
                                </input>
                              </div>

                              <div class="form-group{{ $errors->has('capacidad_2') ? ' has-danger' : '' }} col-sm-6">
                                <label for="capacidad_2">{{ __('Capacidad compartimiento 2 (LTS)') }}</label>
                                <input aria-describedby="capacidad_2Help" aria-required="true" class="form-control{{ $errors->has('capacidad_2') ? ' is-invalid' : '' }}" id="input-capacidad_2" name="capacidad_2" type="number" value="{{ old('capacidad_2',1)}}">
                                  @if ($errors->has('capacidad_2'))
                                    <span class="error text-danger" for="input-capacidad_2" id="capacidad_2-error">
                                      {{ $errors->first('capacidad_1') }}
                                    </span>
                                  @endif
                                </input>
                              </div>
                            </div>

                            <div class="row mt-3 mb-3">
                              <div class="col-sm-6">
                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" id="input-id_status" name="id_status" data-width="100%">
                                  <option disabled selected>Estatus</option>
                                  @foreach($states as $state)
                                    <option value="{{ $state->id }}">{{ $state->estado }}</option>
                                  @endforeach
                                </select>
                              </div>

                              <div class="col-sm-6">
                                <select class="selectpicker" data-style="btn btn-primary btn-round" title="Single Select" id="input-tractor_id" name="tractor_id" data-width="100%">
                                  <option disabled selected>Tractores</option>
                                  @foreach($tractors as $tractor)
                                    @if (count($tractor->pipes)<3)
                                      <option value="{{ $tractor->id }}">{{ $tractor->tractor }}</option>  
                                    @endif
                                  @endforeach
                                </select>
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
