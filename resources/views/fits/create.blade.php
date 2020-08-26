@extends('layouts.app', ['activePage' => 'Fits', 'titlePage' => __('Fits')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Fits') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Llena el formulario para agregar el fit a la terminal correspondiente.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('fits.store') }}" autocomplete="off" class="form-horizontal" method="post">
                            @csrf
                    		@method('post')
                            <div class="form-group col-md-3">
                                <label for="input-razon_social">
                                    Terminal
                                </label>
                                <select class="custom-select custom-select-sm" id="cotizador" name="terminal_id">
                                    @foreach($terminals as $terminal)
                                    <option value="{{$terminal->id}}">
                                        {{$terminal->razon_social}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="policom">
                                        Policom
                                    </label>
                                    <input class="form-control" id="policom" name="policom" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="impulsa">
                                        Impulsa
                                    </label>
                                    <input class="form-control" id="impulsa" min="0" name="impulsa" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="comision">
                                        Comision
                                    </label>
                                    <input class="form-control" id="comision" name="comision" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="regular_fit">
                                        Regular fit
                                    </label>
                                    <input class="form-control" id="regular_fit" name="regular_fit" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="premium_fit">
                                        Premium fit
                                    </label>
                                    <input class="form-control" id="premium_fit" name="premium_fit" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                                <div class="form-group col">
                                    <label for="disel_fit">
                                        Diesel fit
                                    </label>
                                    <input class="form-control" id="disel_fit" name="disel_fit" placeholder="0" type="text" value="">
                                    </input>
                                </div>
                            </div>
                            <div class="card-footer ml-auto mr-auto">
                                <button class="btn btn-primary" type="submit">
                                    {{ __('Guardar') }}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
