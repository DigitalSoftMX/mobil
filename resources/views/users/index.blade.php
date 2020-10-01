@extends('layouts.app', ['page' => __('Gestión de usuarios'), 'pageSlug' => __('Usuarios')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">{{ __('Usuarios') }}</h4>
                <p class="card-category"> {{ __('Aquí puedes administrar a los usuarios.') }}</p>
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
                  <div class="col-12 text-right">
                    @if(auth()->user()->roles[0]->id == 1)
                    <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary">{{ __('Agregar Usuario') }}</a>
                    @endif
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table dataTable table-sm table-striped table-no-bordered table-hover material-datatables" cellspacing="0" width="100%"  id="datatables_1">
                    <thead class=" text-primary">
                      <th>
                          {{ __('Nombre') }}
                      </th>
                      <th>
                        {{ __('Email') }}
                      </th>
                      <th>
                        {{ __('Teléfono') }}
                      </th>
                      <th>
                        {{ __('Rol') }}
                      </th>
                      <th>
                        {{ __('Estación') }}
                      </th>
                      <th>
                        {{ __('Fecha de Alta') }}
                      </th>
                      @if(auth()->user()->roles[0]->id == 1)
                        <th class="text-center th-actions">{{ __('Acciones') }}</th>

                      @endif
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                        <tr>
                          <td>
                            {{ $user->name }} {{ $user->app_name }} {{ $user->apm_name }}
                          </td>
                          <td>
                            {{ $user->email }}
                          </td>
                          <td>
                            {{ $user->phone }}
                          </td>
                          <td>
                            @foreach( $user->roles as $rol)
                              {{ $rol->name }}
                            @endforeach
                          </td>
                          <td  width="5%">
                            <select id="input-razon_social" name="razon_social[]" class="selectpicker mb-2" multiple data-style="btn-primary">
                              @foreach( $user->estacions as $estacion)
                                <option selected disabled>{{ $estacion->nombre_sucursal }}</option>
                              @endforeach  
                            </select>
                            
                          </td>
                          <td>
                           {{ $user->created_at->format('Y-m-d') }}
                          </td>
                          @if(auth()->user()->roles[0]->id == 1)
                          <td class="td-actions text-right">
                            @if ($user->id != auth()->id())
                              <form action="{{ route('user.destroy', $user) }}" method="post">
                                  @csrf
                                  @method('delete')
                              
                                  <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('user.edit', $user) }}" data-original-title="" title="">
                                    <i class="tim-icons icon-pencil"></i>
                                  </a>
                                  <button type="button" class="btn btn-danger btn-link" data-original-title="" title="" onclick="confirm('{{ __("¿Estás seguro de que deseas eliminar a este usuario?") }}') ? this.parentElement.submit() : ''">
                                    <i class="tim-icons icon-trash-simple"></i>
                                  </button>
                              </form>
                            @else
                              <a rel="tooltip" class="btn btn-success btn-link" href="{{ route('profile.edit') }}" data-original-title="" title="">
                                <i class="tim-icons icon-pencil"></i>
                              </a>
                            @endif
                          </td>
                          @endif
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
