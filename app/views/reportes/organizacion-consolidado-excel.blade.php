<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
    <body>
<?php   
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename= ListResumenOrgaPolitConsolidadoxODPE.xls");
header("Pragma: no-cache");		
$path = str_replace(DIRECTORY_SEPARATOR,'/', public_path());  
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
            <td></td>
            <td align="right"> Fecha: <?php echo $fecha = date("j/n/Y "); ?></td>
        </tr>
        <tr height="15">
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
        </tr>
        <tr height="15">
            <td  valign="middle" style="vertical-align:middle" align ="center"></td>
            <td></td>
            <td  colspan="6" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
                <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
            </td>        
            <td  align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
        </tr>
        <tr></tr>
        <tr></tr>
        <tr>
            <td></td>
            <td></td>
            <td colspan="6" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>RESUMEN DE ORGANIZACIONES POLÍTICAS POR ODPE</strong></td>
            <td></td>
            <td></td>
        </tr>
    </table>    
<br>
        <table width="100%" class="table-report-excel2" border="1" bordercolor="#3268B1" >
                <tr>
                    <th width="5">N°</th>
                    <th width="30">ODPE</th>
                    <th width="15">ELECCIÓN</th>
                    <th width="10">TRÁMITE</th>
                    <th width="22">PERIODO DE TACHAS</th>
                    <th width="12">INSCRITO</th>
                    <th width="15">NO INSCRITO</th>
                    <th width="26">INSCRITO EN APELACIÓN</th>
                    <th width="30">NO INSCRITO EN APELACIÓN</th>
                </tr> {{$i=1; }}
                @foreach ($data as $odpe) 
                <tr>
                    <td  align="center">{{$i++;}}</td>
                    <td  align="center">{{$odpe -> odpe }}</td>
                    <td  align="center">{{$odpe -> des_amb}}</td>
                    <td  align="center">{{($odpe -> tramite -> e1==null?0:$odpe -> tramite->e1)}}</td>
                    <td  align="center">{{($odpe -> tramite -> e2==null?0:$odpe -> tramite->e2)}}</td>
                    <td  align="center">{{($odpe -> tramite -> e3==null?0:$odpe -> tramite->e3)}}</td>
                    <td  align="center">{{($odpe -> tramite -> e4==null?0:$odpe -> tramite->e4)}}</td>
                    <td  align="center">{{($odpe -> tramite -> e5==null?0:$odpe -> tramite->e5)}}</td>
                    <td  align="center">{{($odpe -> tramite -> e6==null?0:$odpe -> tramite->e6)}}</td>
                </tr>
                @endforeach
        </table>
    </body>
</html>



