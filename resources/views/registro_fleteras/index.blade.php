@extends('layouts.app', ['activePage' => 'Fleteras', 'titlePage' => __('Gestión de Fleteras')])


@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Fleteras') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar todas las fleteras.') }}</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <div class="col-10 text-left">
                    <a href="{{ route('fleteras.index') }}" class="btn btn-social btn-just-icon btn-primary" title="Regresar a la lista">
                        <i class="material-icons">arrow_back_ios</i>
                    </a>
                  </div>
	                <div class="col-2 text-right">
	                  <a href="{{ route('registro_fleteras.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar fletera') }}</a>
	                </div>
                </div>
                <div class="table-responsive">
                  <table class="table dataTable table-sm table-striped table-no-bordered table-hover material-datatables" cellspacing="0" width="100%"  id="datatables">
                    <thead class=" text-primary">
                    	<th>
	                        {{ __('ID') }}
	                    </th>
	                    <th>
	                        {{ __('Nombre de la Fletera') }}
	                    </th>
	                    <th>
	                        {{ __('RFC') }}
	                    </th>
	                    <th>
	                        {{ __('CREE') }}
	                    </th>
	                    <th>
	                        {{ __('Telefono') }}
	                    </th>
	                    <th>
	                        {{ __('Dirección') }}
	                    </th>
	                    <th>
	                        {{ __('Contacto') }}
	                    </th>
	                    <th>
	                        {{ __('Fecha de Alta') }}
	                    </th>
	                    <th class="text-right">
	                        {{ __('Acciones') }}
	                    </th>
                    </thead>
                    <tbody>
                      @foreach($freights as $freight)
                        <tr>
                          <td>
                            {{ $freight->id }}
                          </td>
                          <td>
                            {{ $freight->name }}
                          </td>
                          <td>
                            {{ $freight->rfc }}
                          </td>
                          <td>
                            {{ $freight->cre }}
                          </td>
                          <td>
                            {{ $freight->telefono }}
                          </td>
                          <td>
                            {{ $freight->direccion }}
                          </td>
                          <td>
                            {{ $freight->contacto }}
                          </td>
                          <td>
                            {{ $freight->created_at->format('d/m/Y') }}
                          </td>
                          <td class="td-actions text-right">
                            <form action="{{ route('registro_fleteras.destroy', $freight->id) }}" method="post">
                              @csrf
                              @method('delete')
                              <a class="btn btn-success btn-link" data-original-title=""
                                href="{{ route('registro_fleteras.edit', $freight) }}" rel="tooltip"
                                title="">
                                <i class="material-icons">edit</i>
                                <div class="ripple-container">
                                </div>
                              </a>
                              <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar este registro?") }}') ? this.parentElement.submit() : ''">
                                <i class="material-icons">close</i>
                                <div class="ripple-container"></div>
                              </button>
                            </form>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@push('js')
  <script>

   $(document).ready(function() {
    iniciar_date('datatables');
    });
  </script>
@endpush