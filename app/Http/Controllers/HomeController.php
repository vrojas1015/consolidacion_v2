<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql = "select pr . no_proyecto as numero_proyecto, pr . Nombre as nombre_proyecto,
        grt . email as correo
        from OperacionesDet odt, proyecto pr, gerentes grt
        where odt . id_proyecto = pr . id
        and pr . id = grt . id_proyecto
        and odt . estatus = 0";
        $result = DB::SELECT($sql);
        //dd($result);

        //$desglose = DB::table('')

        return view('home')->with('sqls', $result);
    }
}
