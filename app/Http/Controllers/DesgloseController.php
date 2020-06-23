<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Flash;

class DesgloseController extends Controller
{
    public function index()
    {
        return view('desglose.index');
    }

    public function buscar()
    {
        $inputV = request()->validate([
            "_token" => [''],
            "primero" => [''],
        ]);
        $input = \request()->all();
        $diap = substr($input['primero'], -2);
        $mesp = substr($input['primero'], -5, 2);
        $anop = substr($input['primero'], -10, 4);
        //dd($input, $diap, $mesp, $anop);


        $desglose = "select  sum(no_operaciones) \"operacionesactuales\",
        (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
       where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '06' and year(fecha) = '2019' and cg.grupo = cg.grupo) \"operacioneshistorico\",
        (sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh, cat_grupos gr, proyecto pr
       where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '06' and year(fecha) = '2019' and cg.grupo = cg.grupo)) /
       (select sum(no_operaciones) from Operaciones_Det_Historico
       where month(fecha) = '06' and year (fecha) = '2019') * 100 \"porcentaje\",
       sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico
       where month(fecha) = '06' and year(fecha) = '2019') as \"variacion\", pr.nombre \"proyecto\", cg.grupo  \"grupo\"
       from OperacionesDet opd, proyecto pr, cat_grupos cg
        where opd.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and  month (fecha) = '.$mesp.' and year (fecha) = '.$anop.' #and cg.grupo = ''";
        $result1 = DB::SELECT($desglose);
        //dd($result1);
        if (empty($result1)) {
            Flash::error('Sin resultados');

            return redirect(route('desglose.show'));
        }

        return view('desglose.show')->with('resultados', $result1);
    }
}
