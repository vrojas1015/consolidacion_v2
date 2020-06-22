<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use PHPMailer\PHPMailer\PHPMailer;
use Flash;


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
        and odt.fecha < '2020-06-18 14:00:00' and odt.estatus = 0";
        $result = DB::SELECT($sql);


        $desglose = "select (sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico pdh,
        cat_grupos gr, proyecto pr
        where pdh.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos and month(fecha) = '06' and year(fecha) = '2019' and cg.grupo = cg.grupo)) /
        (select sum(no_operaciones) from Operaciones_Det_Historico
        where month(fecha) = '06' and year (fecha) = '2019') * 100 as porcentaje,
        sum(no_operaciones) - (select sum(no_operaciones) from Operaciones_Det_Historico
        where month(fecha) = '06' and year(fecha) = '2019') as variacion,
        cg.grupo  as grupo
        from OperacionesDet opd, proyecto pr, cat_grupos cg
        where opd.id_proyecto = pr.id and pr.id_grupo = cg.id_grupos
        and  month (fecha) = '06' and year (fecha) = '2020'
        #and cg.grupo = ''";
        $result1 = DB::SELECT($desglose);
        //dd($result1);

        //$desglose = DB::table('')

        return view('home')->with('sqls', $result)->with('desgloses', $result1);
    }

    public function enviarEmail()
    {
        //dd("Enviar email");
        $sql = "select pr . no_proyecto as numero_proyecto, pr . Nombre as nombre_proyecto,
        grt . email as correo
        from OperacionesDet odt, proyecto pr, gerentes grt
        where odt . id_proyecto = pr . id
        and pr . id = grt . id_proyecto
        and odt.fecha < '2020-06-18 14:00:00' and odt.estatus = 0";
        $result = DB::SELECT($sql);
        //dd($result);
        foreach ($result as $email) {
            $correo = $email->correo;
            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->SMTPDebug = 0;
            $mail->Debugoutput = 'html';
            $mail->Host = 'smtp.office365.com';
            $mail->Port = 587;
            $mail->SMTPSecure = 'tls';
            $mail->SMTPAuth = true;
            $mail->Username = "facturacion-oce@central-mx.com";
            $mail->Password = "1t3gr4d0r2020*";
            $mail->setFrom('facturacion-oce@central-mx.com', 'Operadora central de estacionamientos');
            //$mail->From = "no-reply@central-mx.com";
            //$mail->FromName = "Central operadora de estacionamientos";
            $mail->Subject = "Operaciones";
            $mail->Body = "<html>
                    <meta charset='utf-8'>
                    <h4 style='font-color: green;' align='center';>Central Operadora de Estacionamientos SAPI S.A. de C.V.</h4>
                    <p align='center;'>Buenas tardes gerente.</p>
                    <p align='center;'>Se te solicite cargues tus operaciones del dia de manera inmediata.</p>
                    </html>";
            $mail->AddAddress($correo);
            $mail->IsHTML(true);
            $mail->Send();

            Flash::success('Correos enviados satisfactoriamente.<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>');
            return redirect(route('home'));

        }

    }

}
