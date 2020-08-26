@extends('layouts.app', ['activePage' => 'Captura de precios pemex', 'titlePage' => __('Captura de Precios Pemex')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">
                            {{ __('Precios de la competencia') }}
                        </h4>
                        <p class="card-category">
                            {{ __('Aqui puedes gestionar los precios de la competencia.') }}
                        </p>
                    </div>
                    <div class="card-body">
                        @if (session('status'))
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    <button aria-label="Close" class="close" data-dismiss="alert" type="button">
                                        <i class="material-icons">
                                            close
                                        </i>
                                    </button>
                                    <span>
                                        {{ session('status') }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-12 text-right">
                                <a class="btn btn-sm btn-primary" href="{{ route('competencia.create') }}">
                                    {{ __('Agregar Precio') }}
                                </a>
                            </div>
                        </div>
                        <div class="material-datatables">
                            <table cellspacing="0" class="table table-striped table-no-bordered table-hover"
                                id="datatables" style="width:100%" width="100%">
                                <thead class="text-primary">
                                    {{-- <th>
                                        {{ __('ID')}}
                                    </th> --}}
                                    <th>
                                        {{ __('Nombre')}}
                                    </th>
                                    <th>
                                        {{ __('Precio Regular')}}
                                    </th>
                                    <th>
                                        {{ __('Precio Premium')}}
                                    </th>
                                    <th>
                                        {{ __('Precio Diesel')}}
                                    </th>
                                    <th>
                                        {{ __('Fecha de Alta')}}
                                    </th>
                                    <th class="disabled-sorting text-right">
                                        Acciones
                                    </th>
                                </thead>
                                <tbody>
                                    @foreach($competicions as $competicion)
                                    <tr>
                                        {{-- <td>
                                            {{ $competicion->id }}
                                        </td> --}}
                                        <td>
                                            {{ $competicion->nombre }} -
                                            {{ $competicion->prices[(count($competicion->prices)) - 1]->competition_id}}
                                        </td>
                                        <td>
                                            {{$competicion->prices[(count($competicion->prices)) - 1]->precio_regular}}
                                        </td>
                                        <td>
                                            {{$competicion->prices[(count($competicion->prices)) - 1]->precio_premium}}
                                        </td>
                                        <td>
                                            {{$competicion->prices[(count($competicion->prices)) - 1]->precio_disel}}
                                        </td>
                                        <td>
                                            {{ $competicion->prices[(count($competicion->prices)) - 1]->updated_at }}
                                        </td>
                                        <td class="td-actions text-right">
                                            <form action="" method="post">
                                                @csrf
                                                @method('delete')
                                                <a class="btn btn-success btn-link" data-original-title=""
                                                    href="{{ route('competencia.edit', $competicion) }}" rel="tooltip"
                                                    title="">
                                                    <i class="material-icons">
                                                        edit
                                                    </i>
                                                    <div class="ripple-container">
                                                    </div>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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
</div>
@endsection
