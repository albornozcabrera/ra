
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style('css/program/reports.css') ?>
    </head>
    <body>

        <?php
        header("Content-Type: application/vnd.ms-excel");
        header("Content-Disposition: attachment; filename=avanceOrgPolRegAmb.xls");
        header("Pragma: no-cache");
        $path = str_replace(DIRECTORY_SEPARATOR, '/', public_path());
        ?>
        <img src="{{ $path}}/img/plantilla/logo_onpe3.png"/>
        
        <table border="1">
            <tr height="15">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>
            </tr>
            <tr height="15">
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
            </tr>
            <tr height="15">
                <td  valign="middle" style="vertical-align:middle" align ="center">
                </td>
                <td  colspan="6" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
                    <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
                </td>        
                <td colspan="2" align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
            </tr>
            <tr></tr>
            <tr></tr>
            <tr>
                <td></td>
                <td colspan="6" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>AVANCE DE ORGANIZACIONES POLÍTICAS REGISTRADAS POR AMBITO</strong></td>
                <td></td>
                <td></td>
            </tr>
        </table>  

        <table class="table-report-excel2" border="1" bordercolor="#3268B1">

            <tr>
                <th rowspan="2" valign="middle" style="vertical-align:middle">TIPO ORGANIZACIÓN POLÍTICA</th>
                <th colspan="6" align ="center">ESTADO</th>
                <th rowspan="2" valign="middle" style="vertical-align:middle">AVANCE</th>
                <th rowspan="2" valign="middle" style="vertical-align:middle">FALTAN</th>
            </tr>
            <tr>
                <th></th>
                <th>EN<br>TRÁMITE</th>
                <th>PERIODO<br>DE TACHA</th>
                <th>INSCRITO</th>
                <th>NO<br>INSCRITO</th>
                <th>INSCRITO EN APELACIÓN</th>
                <th>NO INSCRITO<br>EN APELACIÓN</th>
            </tr>
            @foreach ($data as $col)
            <tr>
                <td  width="30">{{$col->ambito }}</td>
                <td width="16" align="center">{{$col->tramite }}</td>
                <td width="20" align="center">{{$col->periodo_tacha }}</td>
                <td width="15" align="center">{{$col->inscrito }}</td>
                <td width="15" align="center">{{$col->no_inscrito}}</td>
                <td width="28" align="center">{{$col->inscrito_apel }}</td>
                <td width="30" align="center">{{$col->no_inscrito_apel }}</td>
                <td width="12" align="center">{{$col->avance }}</td>
                <td width="12" align="center">{{$col->faltan }}</td>
            </tr>
            @endforeach
        </table>

    </body>
</html>