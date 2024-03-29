@extends('layouts.app', ['pageSlug' => 'dashboard'])

@section('content')
    @if(auth()->user()->roles[0]->id == 1 || auth()->user()->roles[0]->id == 3 || auth()->user()->roles[0]->id == 4)
    <div class="row">
        <div class="col-lg-8 col-md-6">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Ventas Totales</h4>
                                    <h3 class="text-dark title mt-0 mb-0">{{ $order_totales }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Estaciones Registradas</h4>
                                    <h3 class="text-dark title mt-0 mb-0">{{ $estacion_total }}</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title mb-0">Abonos Solicitados</h4>
                                    <div class="row">
                                        <h3 class="text-dark title mt-0 mb-0 col-sm-1">
                                            {{ $abonos_pendientes }}
                                        </h3>
                                        <a href="{{ route('abonos.index') }}" class="col-sm-6 text-left mt-1">
                                            <span class="badge badge-info mb-0">Autorizar</span>
                                        </a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card card-chart">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <h2 class="card-title text-info">Ventas Totales</h2>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                        <input type="radio" name="options" checked>
                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Extra</span>
                                        <span class="d-block d-sm-none">
                                            EX
                                        </span>
                                    </label>
                                    <label class="btn btn-sm btn-danger btn-simple" id="1">
                                        <input type="radio" class="d-none d-sm-none" name="options">
                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Supreme</span>
                                        <span class="d-block d-sm-none">
                                            SU
                                        </span>
                                    </label>
                                    <label class="btn btn-sm btn-default btn-simple" id="2">
                                        <input type="radio" class="d-none" name="options">
                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Diésel</span>
                                        <span class="d-block d-sm-none">
                                            DI
                                        </span>
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area ">
                                <canvas id="chartBig1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-tasks">
                <div class="card-header ">
                    <h3 class="title d-inline text-info">Estaciones</h3>
                    <!--div class="dropdown">
                        <button type="button" class="btn btn-link dropdown-toggle btn-icon" data-toggle="dropdown">
                            <i class="tim-icons icon-settings-gear-63"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#pablo">Action</a>
                            <a class="dropdown-item" href="#pablo">Another action</a>
                            <a class="dropdown-item" href="#pablo">Something else</a>
                        </div>
                    </div-->
                </div>
                <div class="card-body ">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($estaciones_info as $estacion_1)
                                <tr>
                                    <td>
                                        <p class="title text-info">{{ $estacion_1->nombre_sucursal }}</p>
                                        <p class="text-muted">Saldo ${{ number_format($estacion_1->saldo, 2) }}</p>
                                        @if($estacion_1->credito_usado > $estacion_1->credito)
                                        <p class="text-danger">Crédito utilizado  ${{ number_format($estacion_1->credito_usado, 2) }}</p>
                                        @else
                                        <p class="text-muted">Crédito utilizado  ${{ number_format($estacion_1->credito_usado, 2) }}</p>
                                        @endif
                                        <p class="text-muted">Crédito ${{ number_format($estacion_1->credito, 2) }}</p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <a class="btn btn-danger btn-link" data-original-title=""
                                            href="{{ route('estaciones.show', $estacion_1) }}" rel="tooltip"
                                            title="Ver información de la estación">
                                            <i class="tim-icons icon-minimal-right text-info"></i>
                                        </a>
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

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-tasks">
                <div class="card-header mb-1">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="card-title">Estado de Cuenta</h3>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group col-sm-3 float-right p-0 m-0">
                                <select id="select_dash_info_estado" class="selectpicker show-menu-arrow mt-0 pt-0" data-style="btn-primary" data-live-search="true" data-width="100%">
                                    <option value="*">Todas</option>
                                @foreach($estaciones_info as $estacion)
                                    <option value="{{ $estacion->id }}">{{ $estacion->nombre_sucursal }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="row">
                        <div class="table-full-width table-responsive col-sm-4">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>{{ __('Estación') }}</th>
                                    <th>{{ __('Credito utilizado') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($estaciones_info as $estacion_1)
                                    @if($estacion_1->credito_usado > 0)
                                    <tr>
                                        <td>
                                            <p class="title text-info">{{ $estacion_1->nombre_sucursal }}</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">${{ number_format($estacion_1->credito_usado, 2) }}</p>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach  
                                    <tr>
                                        <td>
                                            <h4 class="title text-darker text-right">Total:</h4>
                                        </td>
                                        <td>
                                            <h4 class="title text-darker">${{ number_format($estaciones_info->sum('credito_usado'), 2) }}</h4>
                                        </td>
                                    </tr>              
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="table-full-width table-responsive col-sm-8">
                            <table class="table"  id="table_dash_info_estado">
                                <thead class=" text-primary">
                                    <th>{{ __('Estación') }}</th>
                                    <th>{{ __('Descripción') }}</th>
                                    <th>{{ __('Importe') }}</th>
                                    <th>{{ __('Cubierto') }}</th>
                                    <th>{{ __('Fecha de expiración') }}</th>
                                </thead>
                                <tbody>
                                @php
                                    $total_suma = 0;
                                @endphp
                                @foreach($estaciones_info as $estacion_1)
                                    @foreach($estacion_1->orders->where('status_id', '<=',5)->where('pagado', '==', 'FALSE') as $ventas)
                                    <tr>
                                        <td>{{ $estacion_1->nombre_sucursal }}</td>
                                        <td>{{ $ventas->po }} - {{ $ventas->producto }} - {{  number_format($ventas->cantidad_lts, 0) }}L</td>
                                        <td>
                                            @if($ventas->costo_real == '')
                                            ${{ number_format($ventas->costo_aprox, 2) }}
                                            @else
                                            ${{ number_format($ventas->costo_real, 2) }}
                                            @endif
                                        </td>
                                        <td>${{ number_format($ventas->total_abonado, 2) }}</td>
                                        <td>{{ Carbon\Carbon::parse($ventas->fecha_expiracion)->format('d/m/Y') }}</td>
                                    </tr>
                                    @endforeach
                                    @foreach($estacion_1->differentbill->where('id_status', 1) as $factura)
                                    @if(Carbon\Carbon::parse($factura->expiration_date)->format('d/m/Y') <= now()->format('d/m/Y'))
                                    <tr>
                                        <td><p class="text-danger">{{ $estacion_1->nombre_sucursal }}</p></td>
                                        <td><p class="text-danger">{{ $factura->description }}</p></td>
                                        <td class="td-number"><p class="text-danger">${{ number_format($factura->quantity, 2) }}</p></td>
                                        <td class="td-number"><p class="text-danger">${{ number_format($factura->differentbills->where('id_status', 2)->sum('cantidad'), 2) }}</p></td>
                                        <td><p class="text-danger">{{ Carbon\Carbon::parse($factura->expiration_date)->format('d/m/Y') }}</p></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ $estacion_1->nombre_sucursal }}</td>
                                        <td>{{ $factura->description }}</td>
                                        <td>${{ number_format($factura->quantity, 2) }}</td>
                                        <td>${{ number_format($factura->differentbills->where('id_status', 2)->sum('cantidad'), 2) }}</td>
                                        <td>{{ Carbon\Carbon::parse($factura->expiration_date)->format('d/m/Y') }}</td>
                                    </tr>
                                    @endif
                                    @php
                                        $total_suma = $total_suma + $factura->differentbills->where('id_status', 2)->sum('cantidad');
                                    @endphp
                                    @endforeach
                                @endforeach
                                    <tr>
                                        <td colspan="2" scope="row" class="text-right"></td>
                                        <td>
                                            ${{ number_format($info_pedidos->where('status_id', '<=',5)->where('pagado', '==', 'FALSE')->sum('costo_real') + $info_pedidos->where('status_id', '<=',5)->where('costo_real', '==', '')->where('pagado', 'FALSE')->sum('costo_aprox') + $info_facturas->where('id_status', 1)->sum('quantity'), 2 )}}
                                        </td>
                                        <td colspan="2">
                                            ${{ number_format($info_pedidos->where('status_id', '<=',5)->where('pagado', 'FALSE')->sum('total_abonado') + $total_suma, 2 )}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" scope="row" class="text-right">Total:</td>
                                        <td colspan="3">
                                            ${{ number_format($info_pedidos->where('status_id', '<=',5)->where('pagado', 'FALSE')->sum('costo_real') + $info_pedidos->where('status_id', '<=',5)->where('costo_real', '==', '')->where('pagado', 'FALSE')->sum('costo_aprox') + $info_facturas->where('id_status', 1)->sum('quantity') - $info_pedidos->where('status_id', '<=',5)->where('pagado', 'FALSE')->sum('total_abonado') - $total_suma, 2 )}}
                                        </td>
                                    </tr>             
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6">
            <div class="card card-chart card-tasks">
                <div class="card-header">
                    <h3 class="card-title mt-2">Estaciones con más Compras</h3>
                    <h4 class="card-title mt-2"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500</h4>
                </div>
                <div class="card-body">
                    <div class="chart-area mt-5">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card card-tasks">
                <div class="card-header">
                    <h3 class="card-title mt-2">Ultima Actualización de Precios</h3>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="table-full-width table-responsive">
                        <table class="table table-no-bordered table-hover mt-0 mb-0 pt-0 pb-0" cellspacing="0" width="100%" id="datatables_1">
                            <thead class="text-primary">
                                <th>{{ __('Fecha') }}</th>
                                <th>{{ __('Nombre Sucursal') }}</th>
                                <th>{{ __('Extra') }}</th>
                                <th>{{ __('Supreme') }}</th>
                                <th>{{ __('Diesel') }}</th>
                            </thead>
                            <tbody>
                                @foreach ( $precios_actuales_estaciones as $precio_actual_estacion )
                                    <tr>
                                        <td>{{ $precio_actual_estacion->fecha }}</td>
                                        <td>{{ $precio_actual_estacion->nombre_sucursal }}</td>
                                        <td>{{ $precio_actual_estacion->extra }}</td>
                                        <td>{{ $precio_actual_estacion->supreme }}</td>
                                        <td>{{ $precio_actual_estacion->diesel }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4 d-none">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Shipments</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-none">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Completed Tasks</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @else
    <div class="row">
        <div class="col-lg-8 col-md-6">
            <div class="row">
                <div class="col-12">
                    <div class="card card-chart card-tasks">
                        <div class="card-header ">
                            <div class="row">
                                <div class="col-sm-6 text-left">
                                    <h2 class="card-title text-info">Pedidos Totales</h2>
                                </div>
                                <div class="col-sm-6">
                                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                                    <label class="btn btn-sm btn-primary btn-simple active" id="0">
                                        <input type="radio" name="options" checked>
                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Extra</span>
                                        <span class="d-block d-sm-none">
                                            EX
                                        </span>
                                    </label>
                                    <label class="btn btn-sm btn-danger btn-simple" id="1">
                                        <input type="radio" class="d-none d-sm-none" name="options">
                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Supreme</span>
                                        <span class="d-block d-sm-none">
                                            SU
                                        </span>
                                    </label>
                                    <label class="btn btn-sm btn-default btn-simple" id="2">
                                        <input type="radio" class="d-none" name="options">
                                        <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Diésel</span>
                                        <span class="d-block d-sm-none">
                                            DI
                                        </span>
                                    </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart-area mt-5">
                                <canvas id="chartBig1"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6">
            <div class="card card-tasks">
                <div class="card-header ">
                    <h3 class="title d-inline text-info">Estaciones</h3>
                </div>
                <div class="card-body ">
                    <div class="table-full-width table-responsive">
                        <table class="table">
                            <tbody>
                                @foreach($estaciones_info as $estacion_1)
                                <tr>
                                    <td>
                                        <p class="title text-info">{{ $estacion_1->nombre_sucursal }}</p>
                                        <p class="text-muted">Saldo ${{ number_format($estacion_1->saldo, 2) }}</p>
                                        <p class="text-muted">Credito ${{ number_format($estacion_1->credito, 2) }}</p>
                                        <p class="text-muted">Credito Utilizado ${{ number_format($estacion_1->credito_utilizado, 2) }}</p>
                                    </td>
                                    <td class="td-actions text-right">
                                        <a class="btn btn-danger btn-link" data-original-title=""
                                            href="{{ route('estaciones.show', $estacion_1) }}" rel="tooltip"
                                            title="Ver información de la estación">
                                            <i class="tim-icons icon-minimal-right text-info"></i>
                                        </a>
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

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-tasks">
                <div class="card-header mb-1">
                    <div class="row">
                        <div class="col-sm-3">
                            <h3 class="card-title">Estado de Cuenta</h3>
                        </div>
                        <div class="col-sm-9">
                            <div class="form-group col-sm-3 float-right p-0 m-0 d-none">
                                <select id="select_dash_info_estado" class="selectpicker show-menu-arrow mt-0 pt-0" data-style="btn-primary" data-live-search="true" data-width="100%">
                                    <option value="*">Todas</option>
                                @foreach($estaciones_info as $estacion)
                                    <option value="{{ $estacion->id }}">{{ $estacion->nombre_sucursal }}</option>
                                @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="row">
                        <div class="table-full-width table-responsive col-sm-4">
                            <table class="table">
                                <thead class=" text-primary">
                                    <th>{{ __('Estación') }}</th>
                                    <th>{{ __('Credito utilizado') }}</th>
                                </thead>
                                <tbody>
                                    @foreach($estaciones_info as $estacion_1)
                                    @if($estacion_1->credito_usado > 0)
                                    <tr>
                                        <td>
                                            <p class="title text-info">{{ $estacion_1->nombre_sucursal }}</p>
                                        </td>
                                        <td>
                                            <p class="text-muted">${{ number_format($estacion_1->credito_usado, 2) }}</p>
                                        </td>
                                    </tr>
                                    @endif
                                    @endforeach  
                                    <tr>
                                        <td>
                                            <h4 class="title text-darker text-right">Total:</h4>
                                        </td>
                                        <td>
                                            <h4 class="title text-darker">${{ number_format($estaciones_info->sum('credito_usado'), 2) }}</h4>
                                        </td>
                                    </tr>              
                                </tbody>
                            </table>
                            
                        </div>
                        <div class="table-full-width table-responsive col-sm-8">
                            <table class="table"  id="table_dash_info_estado">
                                <thead class=" text-primary">
                                    <th>{{ __('Estación') }}</th>
                                    <th>{{ __('Descripción') }}</th>
                                    <th>{{ __('Importe') }}</th>
                                    <th>{{ __('Cubierto') }}</th>
                                    <th>{{ __('Fecha de expiración') }}</th>
                                </thead>
                                <tbody>
                                @php
                                    $total_suma = 0;
                                    $total_cantidad = 0;
                                @endphp
                                @foreach($estaciones_info as $estacion_1)
                                    @foreach($estacion_1->orders->where('status_id', '<=',5)->where('pagado', '==', 'FALSE') as $ventas)
                                    <tr>
                                        <td>{{ $estacion_1->nombre_sucursal }}</td>
                                        <td>{{ $ventas->po }} - {{ $ventas->producto }} - {{  number_format($ventas->cantidad_lts, 0) }}L</td>
                                        <td>
                                            @if($ventas->costo_real == '')
                                            ${{ number_format($ventas->costo_aprox, 2) }}
                                                @php
                                                    $total_cantidad = $total_cantidad + $ventas->costo_aprox;
                                                @endphp
                                            @else
                                            ${{ number_format($ventas->costo_real, 2) }}
                                                @php
                                                    $total_cantidad = $total_cantidad + $ventas->costo_real;
                                                @endphp
                                            @endif
                                        </td>
                                        <td>${{ number_format($ventas->total_abonado, 2) }}</td>
                                        <td>{{ Carbon\Carbon::parse($ventas->fecha_expiracion)->format('d/m/Y') }}</td>
                                    </tr>
                                    @php
                                        $total_suma = $total_suma + $ventas->total_abonado;
                                    @endphp

                                    @endforeach
                                    @foreach($estacion_1->differentbill->where('id_status', 1) as $factura)
                                    @if(Carbon\Carbon::parse($factura->expiration_date)->format('d/m/Y') <= now()->format('d/m/Y'))
                                    <tr>
                                        <td><p class="text-danger">{{ $estacion_1->nombre_sucursal }}</p></td>
                                        <td><p class="text-danger">{{ $factura->description }}</p></td>
                                        <td class="td-number"><p class="text-danger">${{ number_format($factura->quantity, 2) }}</p></td>
                                        <td class="td-number"><p class="text-danger">${{ number_format($factura->differentbills->where('id_status', 2)->sum('cantidad'), 2) }}</p></td>
                                        <td><p class="text-danger">{{ Carbon\Carbon::parse($factura->expiration_date)->format('d/m/Y') }}</p></td>
                                    </tr>
                                    @else
                                    <tr>
                                        <td>{{ $estacion_1->nombre_sucursal }}</td>
                                        <td>{{ $factura->description }}</td>
                                        <td>${{ number_format($factura->quantity, 2) }}</td>
                                        <td>${{ number_format($factura->differentbills->where('id_status', 2)->sum('cantidad'), 2) }}</td>
                                        <td>{{ Carbon\Carbon::parse($factura->expiration_date)->format('d/m/Y') }}</td>
                                    </tr>
                                    @endif
                                    @php
                                        $total_suma = $total_suma + $factura->differentbills->where('id_status', 2)->sum('cantidad');
                                        $total_cantidad = $total_cantidad + $factura->quantity;
                                    @endphp
                                    @endforeach
                                @endforeach
                                    <tr>
                                        <td colspan="2" scope="row" class="text-right"></td>
                                        <td>
                                            ${{ number_format($total_cantidad, 2 )}}
                                        </td>
                                        <td colspan="2">
                                            ${{ number_format($total_suma, 2 )}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" scope="row" class="text-right">Total:</td>
                                        <td colspan="3">
                                            ${{ number_format($total_cantidad - $total_suma, 2 )}}
                                        </td>
                                    </tr>             
                                </tbody>
                            </table>
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-lg-6 d-none">
            <div class="card card-chart card-tasks">
                <div class="card-header">
                    <h3 class="card-title mt-2">ESTACIONES CON MÁS COMPRAS</h3>
                    <!--h4 class="card-title mt-2"><i class="tim-icons icon-delivery-fast text-info"></i> 3,500</h4-->
                </div>
                <div class="card-body">
                    <div class="chart-area mt-5">
                        <canvas id="CountryChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-none">
            <div class="card card-tasks">
                <div class="card-header">
                    <h3 class="card-title mt-2">Historial de precios</h3>
                </div>
                <div class="card-body pt-0 pb-0">
                    <div class="table-full-width table-responsive">
                        <table class="table table-no-bordered table-hover mt-0 mb-0 pt-0 pb-0" cellspacing="0" width="100%" id="datatables_1">
                            <thead class="text-primary">
                                <th>{{ __('Fecha') }}</th>
                                <th>{{ __('Nombre Sucursal') }}</th>
                                <th>{{ __('Extra') }}</th>
                                <th>{{ __('Supreme') }}</th>
                                <th>{{ __('Diesel') }}</th>
                            </thead>
                            <tbody>
                                @foreach ( $precios_actuales_estaciones as $precio_actual_estacion )
                                    <tr>
                                        <td>{{ $precio_actual_estacion->fecha }}</td>
                                        <td>{{ $precio_actual_estacion->nombre_sucursal }}</td>
                                        <td>{{ $precio_actual_estacion->extra }}</td>
                                        <td>{{ $precio_actual_estacion->supreme }}</td>
                                        <td>{{ $precio_actual_estacion->diesel }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

        <div class="col-lg-4 d-none">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Total Shipments</h5>
                    <h3 class="card-title"><i class="tim-icons icon-bell-55 text-primary"></i> 763,215</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLinePurple"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 d-none">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-category">Completed Tasks</h5>
                    <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 12,100K</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="chartLineGreen"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
 
@endsection

@push('js')
    <script src="{{ asset('white') }}/js/plugins/chartjs.min.js"></script>
    <script>
        
        function initDashboardPageCharts() {

            gradientChartOptionsConfigurationWithTooltipBlue = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                backgroundColor: '#f5f5f5',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
            },
            responsive: true,
            scales: {
                yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.0)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    suggestedMin: 60,
                    suggestedMax: 125,
                    padding: 20,
                    fontColor: "#2380f7"
                }
                }],

                xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    padding: 20,
                    fontColor: "#2380f7"
                }
                }]
            }
            };

            gradientChartOptionsConfigurationWithTooltipPurple = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                backgroundColor: '#f5f5f5',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
            },
            responsive: true,
            scales: {
                yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.0)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    suggestedMin: 60,
                    suggestedMax: 125,
                    padding: 20,
                    fontColor: "#9a9a9a"
                }
                }],

                xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(225,78,202,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    padding: 20,
                    fontColor: "#9a9a9a"
                }
                }]
            }
            };

            gradientChartOptionsConfigurationWithTooltipOrange = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                backgroundColor: '#f5f5f5',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
            },
            responsive: true,
            scales: {
                yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.0)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    suggestedMin: 50,
                    suggestedMax: 110,
                    padding: 20,
                    fontColor: "#ff8a76"
                }
                }],

                xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(220,53,69,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    padding: 20,
                    fontColor: "#ff8a76"
                }
                }]
            }
            };

            gradientChartOptionsConfigurationWithTooltipGreen = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                backgroundColor: '#f5f5f5',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
            },
            responsive: true,
            scales: {
                yAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.0)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    suggestedMin: 50,
                    suggestedMax: 125,
                    padding: 20,
                    fontColor: "#9e9e9e"
                }
                }],

                xAxes: [{
                barPercentage: 1.6,
                gridLines: {
                    drawBorder: false,
                    color: 'rgba(0,242,195,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    padding: 20,
                    fontColor: "#9e9e9e"
                }
                }]
            }
            };


            gradientBarChartConfiguration = {
            maintainAspectRatio: false,
            legend: {
                display: false
            },

            tooltips: {
                backgroundColor: '#f5f5f5',
                titleFontColor: '#333',
                bodyFontColor: '#666',
                bodySpacing: 4,
                xPadding: 12,
                mode: "nearest",
                intersect: 0,
                position: "nearest"
            },
            responsive: true,
            scales: {
                yAxes: [{

                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    suggestedMin: 60,
                    suggestedMax: 120,
                    padding: 20,
                    fontColor: "#9e9e9e"
                }
                }],

                xAxes: [{

                gridLines: {
                    drawBorder: false,
                    color: 'rgba(29,140,248,0.1)',
                    zeroLineColor: "transparent",
                },
                ticks: {
                    display: false,
                    padding: 20,
                    fontColor: "#9e9e9e"
                }
                }]
            }
            };

            var ctx = document.getElementById("chartLinePurple").getContext("2d");

            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

            gradientStroke.addColorStop(1, 'rgba(25, 25, 252,0.2)');
            gradientStroke.addColorStop(0.2, 'rgba(25, 25, 252,0.0)');
            gradientStroke.addColorStop(0, 'rgba(25, 25, 252,0)'); //purple colors

            /*var data = {
            labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'],
            datasets: [{
                label: "Data",
                fill: true,
                backgroundColor: gradientStroke,
                borderColor: '#d048b6',
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: '#d048b6',
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: '#d048b6',
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 4,
                data: [80, 100, 70, 80, 120, 80],
            }]
            };

            var myChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: gradientChartOptionsConfigurationWithTooltipPurple
            });*/


            var ctxGreen = document.getElementById("chartLineGreen").getContext("2d");

            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

            gradientStroke.addColorStop(1, 'rgba(66,134,121,0.15)');
            gradientStroke.addColorStop(0.4, 'rgba(66,134,121,0.0)'); //green colors
            gradientStroke.addColorStop(0, 'rgba(66,134,121,0)'); //green colors

            var data = {
            labels: ['JUL', 'AUG', 'SEP', 'OCT', 'NOV'],
            datasets: [{
                label: "My First dataset",
                fill: true,
                backgroundColor: gradientStroke,
                borderColor: '#00d6b4',
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: '#00d6b4',
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: '#00d6b4',
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 4,
                data: [90, 27, 60, 12, 80],
            }]
            };

            var myChart = new Chart(ctxGreen, {
            type: 'line',
            data: data,
            options: gradientChartOptionsConfigurationWithTooltipGreen

            });



            var chart_labels = @json($nombre_del_mes);
            var chart_data = @json($meses_extra);


            var ctx = document.getElementById("chartBig1").getContext('2d');

            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

            gradientStroke.addColorStop(1, 'rgba(25, 25, 252,0.3)');
            gradientStroke.addColorStop(0.4, 'rgba(25, 25, 252,0)');
            gradientStroke.addColorStop(0, 'rgba(25, 25, 252,0)'); //purple colors
            var config = {
            type: 'line',
            data: {
                labels: chart_labels,
                datasets: [{
                label: "Ventas en el mes",
                fill: true,
                backgroundColor: gradientStroke,
                borderColor: '#171ae6',
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                pointBackgroundColor: '#050785',
                pointBorderColor: 'rgba(255,255,255,0)',
                pointHoverBackgroundColor: '#d346b1',
                pointBorderWidth: 20,
                pointHoverRadius: 4,
                pointHoverBorderWidth: 15,
                pointRadius: 4,
                data: chart_data,
                }]
            },
            options: gradientChartOptionsConfigurationWithTooltipPurple
            };
            var myChartData = new Chart(ctx, config);
            $("#0").click(function() {
                var data = myChartData.config.data;
                data.datasets[0].data = chart_data;
                data.datasets[0].borderColor = '#1d8cf8';
                data.datasets[0].pointBackgroundColor = '#0051b5';
                data.labels = chart_labels;
                myChartData.update();
            });
            $("#1").click(function() {
                var chart_data = @json($meses_supreme);
                var data = myChartData.config.data;
                data.datasets[0].data = chart_data;
                data.datasets[0].borderColor = '#DF0632';
                data.datasets[0].pointBackgroundColor = '#ff0034';
                data.labels = chart_labels;
                myChartData.update();
            });

            $("#2").click(function() {
                var chart_data = @json($meses_diesel);
                var data = myChartData.config.data;
                data.datasets[0].data = chart_data;
                data.datasets[0].borderColor = '#403e3f';
                data.datasets[0].pointBackgroundColor = '#0a0a0a';
                data.labels = chart_labels;
                myChartData.update();
            });


            var ctx = document.getElementById("CountryChart").getContext("2d");

            var gradientStroke = ctx.createLinearGradient(0, 230, 0, 50);

            gradientStroke.addColorStop(1, 'rgba(223, 6, 50,1)');
            gradientStroke.addColorStop(0.4, 'rgba(223, 6, 50,1)');
            gradientStroke.addColorStop(0, 'rgba(26, 97, 171,1)'); //blue colors


            var myChart = new Chart(ctx, {
            type: 'bar',
            responsive: true,
            legend: {
                display: false
            },
            data: {
                labels: @json($nombre_estacion),
                datasets: [{
                label: "Ventas",
                fill: true,
                backgroundColor: gradientStroke,
                hoverBackgroundColor: gradientStroke,
                borderColor: '#1f8ef1',
                borderWidth: 2,
                borderDash: [],
                borderDashOffset: 0.0,
                data: @json($ventas_estacion),
                }]
            },
            options: gradientBarChartConfiguration
            });

            }

        $(document).ready(function() {
          initDashboardPageCharts();
        });
    </script>
@endpush
