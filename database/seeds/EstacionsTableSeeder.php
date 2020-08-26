<?php

use App\Estacion;
use App\User;
use Illuminate\Database\Seeder;

class EstacionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $estacion = new Estacion();
        $estacion->razon_social = "*";
        $estacion->rfc = "XEXX010101000";
        $estacion->cre = "PL/11245/EXP/ES/2015";
        /*$estacion->terminal = "Tula";*/
        $estacion->saldo = "0.00";
        $estacion->nombre_sucursal = "*";
        $estacion->linea_credito = "1";
        $estacion->credito = "2000000.00";
        $estacion->credito_usado = "1450409.40";
        $estacion->dias_credito = "10";
        $estacion->retencion = "4";
        $estacion->status = "1";
        $estacion->datos_fiscales = "1";
        $estacion->codigo_postal = "91157";
        $estacion->tipo_de_vialidad = "Avenida";
        $estacion->nombre_de_vialidad = "Lázaro Cárdenas";
        $estacion->n_exterior = "81";
        $estacion->n_interior = "";
        $estacion->nombre_colonia = "Rafael Lucio";
        $estacion->nombre_localidad = "Xalapa";
        $estacion->nombre_municipio_o_demarcacion_territorial = "Ignacio de la Llave";
        $estacion->nombre_entidad_federativa = "Veracruz";
        $estacion->entre_calle = "Esq. Gildardo Aviles";
        $estacion->y_calle = "";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();


        $estacion = new Estacion();
        $estacion->razon_social = "ALDIA, S.A. DE C.V.";
        $estacion->rfc = "XEXX010101000";
        $estacion->cre = "PL/11245/EXP/ES/2015";
        /*$estacion->terminal = "Tula";*/
        $estacion->saldo = "0.00";
        $estacion->nombre_sucursal = "ALDIA XALAPA";
        $estacion->linea_credito = "1";
        $estacion->credito = "2000000.00";
        $estacion->credito_usado = "1450409.40";
        $estacion->dias_credito = "10";
        $estacion->retencion = "4";
        $estacion->status = "1";
        $estacion->datos_fiscales = "1";
        $estacion->codigo_postal = "91157";
        $estacion->tipo_de_vialidad = "Avenida";
        $estacion->nombre_de_vialidad = "Lázaro Cárdenas";
        $estacion->n_exterior = "81";
        $estacion->n_interior = "";
        $estacion->nombre_colonia = "Rafael Lucio";
        $estacion->nombre_localidad = "Xalapa";
        $estacion->nombre_municipio_o_demarcacion_territorial = "Ignacio de la Llave";
        $estacion->nombre_entidad_federativa = "Veracruz";
        $estacion->entre_calle = "Esq. Gildardo Aviles";
        $estacion->y_calle = "";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();

        $estacion = new Estacion();
        $estacion->razon_social = "NATYVO, S.A. DE C.V.";
        $estacion->rfc = "XEXX010101000";
        $estacion->cre = "PL/11245/EXP/ES/2019";
        /*$estacion->terminal = "Tula1";*/
        $estacion->saldo = "0.00";
        $estacion->nombre_sucursal = "NATYVO";
        $estacion->linea_credito = "1";
        $estacion->credito = "2000000.00";
        $estacion->credito_usado = "1450409.40";
        $estacion->dias_credito = "10";
        $estacion->retencion = "4";
        $estacion->status = "1";
        $estacion->datos_fiscales = "1";
        $estacion->codigo_postal = "91157";
        $estacion->tipo_de_vialidad = "Avenida";
        $estacion->nombre_de_vialidad = "Lázaro Cárdenas";
        $estacion->n_exterior = "81";
        $estacion->n_interior = "";
        $estacion->nombre_colonia = "Rafael Lucio";
        $estacion->nombre_localidad = "Xalapa";
        $estacion->nombre_municipio_o_demarcacion_territorial = "Ignacio de la Llave";
        $estacion->nombre_entidad_federativa = "Veracruz";
        $estacion->entre_calle = "Esq. Gildardo Aviles";
        $estacion->y_calle = "";
        $estacion->created_at = now();
        $estacion->updated_at = now();
        $estacion->save();

    }
}
