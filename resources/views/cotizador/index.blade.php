@extends('layouts.app', ['activePage' => 'Cotizador', 'titlePage' => __('Cotizador de Gasolina')])


@section('content')
<div class="content">
    <div class="container-fluid mt-5">
        <form action="{{ route('cotizador.store') }}" autocomplete="off" class="form-horizontal" method="post">
            <div class="row">
                <div class="card card-nav-tabs">
                    <div class="card-header card-header-primary">
                        Cotizador
                        <input id="_token" name="_token" type="hidden" value="{{ csrf_token() }}">
                        </input>
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
                            <div class="form-group col-md-3">
                                <label for="input-razon_social">
                                    Terminal
                                </label>
                                <select class="custom-select custom-select-sm" id="cotizador" name="terminal_id">
                                    @foreach($terminals as $terminal)
                                    @if($terminal->id == 3)
                                    <option value=" {{$terminal->id}}" selected>
                                        {{$terminal->razon_social}}
                                    </option>
                                    @else 
                                    <option value=" {{$terminal->id}}">
                                        {{$terminal->razon_social}}
                                    </option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col col-md-3">
                                <label class="label-control">
                                    Fecha
                                </label>
                                <input class="form-control datetimepicker" id="calendar_first" name="calendar_first" type="text" value="{{ $precios_puebla->created_at }}"/>
                            </div>
                        </div>
                        
                        <h4 class="info-title mt-5">
                            Sin aditivo
                        </h4>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="regular_sin">
                                    Regular
                                </label>
                                <input class="form-control" name="precio_regular" id="regular_sin" placeholder="0" type="text" value="">
                                </input>
                                <input class="form-control" id="regular" placeholder="0" type="hidden" value="{{$precios_puebla->precio_regular}}">
                                </input>
                                <!--input class="form-control" id="precio_regular_descuento" placeholder="0" type="hidden" name="precio_regular_descuento" value="0"-->
                                </input>
                            </div>
                            <div class="form-group col">
                                <label for="premium_sin">
                                    Premium
                                </label>
                                <input class="form-control" name="precio_premium" id="premium_sin" min="0" placeholder="0" type="text" value="">
                                </input>
                                <input class="form-control" id="premium" placeholder="0" type="hidden" value="{{$precios_puebla->precio_premium}}">
                                </input>
                                <!--input class="form-control" id="precio_premium_descuento" placeholder="0" type="hidden" name="precio_premium_descuento" value="0">
                                </input-->
                            </div>
                            <div class="form-group col">
                                <label for="disel_sin">
                                    Diesel
                                </label>
                                <input class="form-control" name="precio_disel" id="disel_sin" placeholder="0" type="text" value="">
                                </input>
                                <input class="form-control" id="diesel" placeholder="0" type="hidden" value="{{$precios_puebla->precio_disel}}">
                                </input>
                                <!--input class="form-control" id="precio_disel_descuento" placeholder="0" type="hidden" name="precio_disel_descuento" value="0">
                                </input-->
                            </div>
                        </div>
                        <h4 class="info-title mt-5">
                            Con aditivo
                        </h4>
                        <div class="form-row">
                            <div class="form-group col">
                                <label for="regular_con">
                                    Regular
                                </label>
                                <input class="form-control" disabled="" id="regular_con" placeholder="0" type="text">
                                </input>
                            </div>
                            <div class="form-group col">
                                <label for="premium_con">
                                    Premium
                                </label>
                                <input class="form-control" disabled="" id="premium_con" min="0" pattern="^[0-9]+" placeholder="0" type="text">
                                </input>
                            </div>
                            <div class="form-group col">
                                <label for="disel_con">
                                    Diesel
                                </label>
                                <input class="form-control" disabled="" id="disel_con" placeholder="0" type="text">
                                </input>
                            </div>
                        </div>
                        <a class="btn btn-primary" href="#0" id="Calcular">
                            Calcular
                        </a>
                        <input class="btn btn-primary" name="save" type="submit">
                            <ul class="nav nav-pills nav-pills-primary mt-5 ocultar" role="tablist" id="nav_adictivo">
                                <li class="nav-item">
                                    <a aria-expanded="true" class="nav-link active" data-toggle="tab" href="#link1" role="tablist">
                                        Sin aditivo
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a aria-expanded="false" class="nav-link" data-toggle="tab" href="#link2" role="tablist">
                                        Con aditivo
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content tab-space ocultar" id="tabla_des">
                                <div aria-expanded="true" class="tab-pane active mt-5" id="link1">
                                    <table class="table table-responsive table-sm" id="tabla_sin_add">
                                        <thead class=" text-center">
                                            <tr>
                                                <th scope="col">
                                                    Nivel
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Resultado
                                                </th>
                                                <th colspan="2" scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Regular
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Resultado
                                                </th>
                                                <th colspan="2" scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Premium
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    <i class="material-icons">get_app publish</i>
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Resultado
                                                </th>
                                                <th colspan="2" scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Disel
                                                </th>
                                            </tr>
                                            <tr>
                                                <th scope="col">
                                                    
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    V
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    P
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    V
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    P
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    V
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    P
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody id="tabla_sin_add_tbody" class="table-bordered">
                                        </tbody>
                                    </table>
                                </div>
                                <div aria-expanded="false" class="tab-pane mt-5" id="link2">
                                    <div aria-expanded="true" class="tab-pane active mt-5" id="link1">
                                        <table class="table" id="tabla_con_add">
                                            <thead class="thead-dark text-center">
                                                <tr>
                                                <th scope="col">
                                                    Nivel
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Lim. inferior - Lim. superior
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Resultado
                                                </th>
                                                <th colspan="2" scope="col" style="background: linear-gradient(60deg, #43a047, #43a047); color: white;">
                                                    Regular
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Lim. inferior - Lim. superior
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Resultado
                                                </th>
                                                <th colspan="2" scope="col" style="background: linear-gradient(60deg, #e53935, #e53935); color: white;">
                                                    Premium
                                                </th>
                                                <th scope="col" colspan="2" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Lim. inferior - Lim. superior
                                                </th>
                                                <th scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Resultado
                                                </th>
                                                <th colspan="2" scope="col" style="background: linear-gradient(60deg, #212121, #212121); color: white;">
                                                    Disel
                                                </th>
                                                </tr>
                                            </thead>
                                            <tbody id="tabla_con_add_tbody">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </input>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('js')
<script>

    $("#Calcular").click(function(){
         $("#nav_adictivo").removeClass("ocultar");
         $("#tabla_des").removeClass("ocultar");
         
    });
    var policon = {{ $fits->policom }};
    var impulsa = {{ $fits->impulsa }};
    var comision = {{ $fits->comision }};
    var regular_fit = {{ $fits->regular_fit }};
    var premium_fit = {{ $fits->premium_fit }};
    var disel_fit = {{ $fits->disel_fit }};
    $( document ).ready(function() {

        init_calendar('calendar_first', '01-01-2020', '07-07-2020');

        $( "#calendar_first" ).blur(function() {
            idTerminal = $('#cotizador').val();
            fecha = $('#calendar_first').val();
            $.ajax({
                url: 'calendario_selec',
                type: 'POST',
                dataType: 'json',
                data: {
                    terminal : idTerminal,
                    fecha : fecha
                },
                headers: { 'X-CSRF-TOKEN': $("#_token").val() },
                success: function(response){
                    var datos =  response;
                    //console.log(datos.precios[0].precio_regular);
                    $("#regular_sin").val(datos.precios[0].precio_regular);
                    $("#premium_sin").val(datos.precios[0].precio_premium);
                    $("#disel_sin").val(datos.precios[0].precio_disel);
                }
            });
        });

        $('#cotizador').change(function(){
            
            idTerminal = $('#cotizador').val();
            $.ajax({
                url: 'cotizador_sele',
                type: 'POST',
                dataType: 'json',
                data: {
                    terminal : idTerminal
                },
                headers: { 'X-CSRF-TOKEN': $("#_token").val() },
                success: function(response){
                    var datos =  response;
                    //console.log(datos.precios.precio_regular);
                    $("#regular").val(datos.precios.precio_regular);
                    $("#premium").val(datos.precios.precio_premium);
                    $("#diesel").val(datos.precios.precio_disel);
                    policon = datos.fits.policom;
                    impulsa = datos.fits.impulsa;
                    comision = datos.fits.cosion;
                    regular_fit = datos.fits.regular_fit;
                    premium_fit = datos.fits.premium_fit;
                    disel_fit = datos.fits.disel_fit;
                }
            });
        });

        

        var suma_fit = dividir(multiplicar(policon)+multiplicar(impulsa)+multiplicar(comision));
        var suma_fit_con_adi = dividir(multiplicar(policon)+multiplicar(impulsa)+multiplicar(comision)+ multiplicar(0.14));


        //suma_fits('premium_sin','premium_con',policon,impulsa,comision);
        //suma_fits('regular_sin','regular_con',policon,impulsa,comision);
        //suma_fits('disel_sin','disel_con',policon,impulsa,comision);

        suma_adictivo('premium_sin','premium_con', 0.14);
        suma_adictivo('regular_sin','regular_con', 0.14);
        suma_adictivo('disel_sin','disel_con', 0.14);


        $( "#Calcular" ).click(function() {
            /*$('#precio_regular_descuento').val(dividir(multiplicar($("#regular_sin").val()) + multiplicar(suma_fit) - multiplicar(regular_fit)));
            $('#precio_premium_descuento').val(dividir(multiplicar($("#premium_sin").val()) + multiplicar(suma_fit) - multiplicar(premium_fit)));
            $('#precio_disel_descuento').val(dividir(multiplicar($("#disel_sin").val()) + multiplicar(suma_fit) - multiplicar(disel_fit)));*/

            $("#tabla_sin_add_tbody tr").remove();
            $("#tabla_con_add_tbody tr").remove();

            @for($i=0; $i<9; $i++) {
                suma_descuento(
                    'tabla_sin_add',
                    'regular_sin',
                    'premium_sin',
                    'disel_sin',
                    {{ $regular[$i][0] }}, 
                    {{ $regular[$i][1] }},
                    {{ $regular[$i][2] }},
                    {{ $premium[$i][0] }},
                    {{ $premium[$i][1] }}, 
                    {{ $premium[$i][2] }},
                    {{ $disel[$i][0] }},
                    {{ $disel[$i][1] }}, 
                    {{ $disel[$i][2] }},
                    suma_fit, 
                    {{ $i+1 }}, 
                    regular_fit, 
                    premium_fit,
                    disel_fit, 
                    {{ $regular[8][2] }}, 
                    {{ $premium[8][2] }}, 
                    {{ $disel[8][2] }},
                    $("#regular").val(),
                    $("#premium").val(),
                    $("#diesel").val(),
                    {{ $regular_pemex[$i][2] }},
                    {{ $premium_pemex[$i][2] }},
                    {{ $diesel_pemex[$i][2] }},
                );

                suma_descuento(
                    'tabla_con_add',
                    'regular_con',
                    'premium_con',
                    'disel_con',
                    {{ $regular[$i][0] }}, 
                    {{ $regular[$i][1] }},
                    {{ $regular[$i][2] }},
                    {{ $premium[$i][0] }},
                    {{ $premium[$i][1] }}, 
                    {{ $premium[$i][2] }},
                    {{ $disel[$i][0] }},
                    {{ $disel[$i][1] }}, 
                    {{ $disel[$i][2] }}, 
                    suma_fit,
                    {{ $i+1 }}, 
                    regular_fit, 
                    premium_fit,
                    disel_fit, 
                    {{ $regular[8][2] }}, 
                    {{ $premium[8][2] }}, 
                    {{ $disel[8][2] }},
                    $("#regular").val(),
                    $("#premium").val(),
                    $("#diesel").val(),
                    {{ $regular_pemex[$i][2] }},
                    {{ $premium_pemex[$i][2] }},
                    {{ $diesel_pemex[$i][2] }},
                );
            }
            @endfor
        });  
      });
</script>
@endpush
