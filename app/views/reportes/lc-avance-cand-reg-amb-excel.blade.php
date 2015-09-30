
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
<?php 
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= ListaOrgResolRegCandOdpe.xls");
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
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
    </tr>
    <tr height="15">
        <td  valign="middle" style="vertical-align:middle" align ="center"></td>
        <td  colspan="10" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td> 
        <td colspan="2" align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="10" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>AVANCE DE CANDIDATOS REGISTRADOS POR ÁMBITO</strong></td>
        <td></td>
    </tr>
</table>


<table width="100%" class="table-report-excel" >
    <tr>
        <th colspan="11" valign="middle" style="vertical-align:middle" align ="center">ESTADO</th>
        <th rowspan="2" width="15" valign="middle" style="vertical-align:middle" align ="center">AVANCE</th>
        <th rowspan="2" width="15" valign="middle" style="vertical-align:middle" align ="center">FALTAN</th>
    </tr>
    <tr>
        <th width="35">TIPO ELECCIÓN</th>

        <th width="15">RECIBIDO</th>
        <th width="15">ADMITIDO</th>
        <th width="15">PUBLICADO</th>
        <th width="15">INSCRITO</th>
        <th width="22">TACHA EN TRÁMITE</th>
        <th width="15">INADMISIBLE</th>
        <th width="15">EXCLUIDO</th>
        <th width="15">RENUNCIA</th>
        <th width="12">FALLECIDO</th>
        <th width="18">IMPROCEDENTE</th>
      </tr>
      @foreach ($data as $col)
      <tr>
        <td align="left">{{$col->ambito }}&nbsp;</td>
        <td align="center">{{$col->recibido }}&nbsp;</td>
        <td align="center">{{$col->admitido }}</td>
        <td align="center">{{$col->publicado }}</td>
        <td align="center">{{$col->inscrito }}</td>
        <td align="center">{{$col->tacha_tramite}}</td>
        <td align="center">{{$col->inadmisible }}</td>
        <td align="center">{{$col->excluido }}&nbsp;</td>
        <td align="center">{{$col->renuncia }}&nbsp;</td>
        <td align="center">{{$col->fallecido }}&nbsp;</td>
        <td align="center">{{$col->improcedente }}&nbsp;</td>  
        <td align="center">{{$col->avance }}&nbsp;</td>
        <td align="center">{{$col->faltan }}&nbsp;</td>
      </tr>
      @endforeach
</table>

</body>
</html>