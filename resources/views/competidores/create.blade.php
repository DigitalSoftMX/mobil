@extends('layouts.app', ['activePage' => 'Captura de precios pemex', 'titlePage' => __('Captura de Precios Pemex')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Competencia') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aquí puedes administrar a la competencia.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('competencia.store') }}" autocomplete="off" class="form-horizontal" method="post">
                            @csrf
                    		@method('post')
                            <div class="form-group col-md-3">
                                <label for="input-razon_social">
                                    Terminal
                                </label>
                                <select class="custom-select custom-select-sm" id="cotizador" name="competition_id">
                                    @foreach($competicions as $competicion)
                                    <option value="{{$competicion->id}}">
                                        {{$competicion->nombre}} - {{$competicion->terminal_id}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="regular_sin">
                                        Regular
                                    </label>
                                    <input class="form-control" id="regular_sin" name="precio_regular" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="premium_sin">
                                        Premium
                                    </label>
                                    <input class="form-control" id="premium_sin" min="0" name="precio_premium" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="disel_sin">
                                        Diesel
                                    </label>
                                    <input class="form-control" id="disel_sin" name="precio_disel" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </form>
                        <table class="table">
                            <thead >
                                <th scope="col">Pemex 1 - Pemex Laredo</th>
                                <th scope="col">Pemex 2 - Pemex Guadalajara</th>
                                <th scope="col">Pemex 3 - Pemex Puebla</th>
                                <th scope="col">Pemex 4 - Pemex Monterrey</th>
                                <th scope="col">Pemex 5 - Pemex Chihuahua</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
