
<html>
    <head>
        <meta http-equiv = "Content-Type" content = "text / html; charset = utf-8" />
        <?= HTML::style ( 'css/program/reports.css' ) ?>
    </head>
<body>
<?php 
    header("Content-Type: application/vnd.ms-excel");
    header("Content-Disposition: attachment; filename= CandidatoCancelados.xls");
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
        <td></td>
        <td colspan="2" align="right">Hora: <?php echo $hora = date(" g:i a "); ?></td>
    </tr>
    <tr height="15">
        <td  valign="middle" style="vertical-align:middle" align ="center"></td>
        <td  colspan="11" valign="middle" style="vertical-align:middle;color: #838383;font-size: 20" align ="center">
            <strong><?= $proc = Session::get('proceso_nombre'); ?></strong>
        </td> 
        <td colspan="2" align="right"> Usuario: <?= $proc = Session::get('usuario.username'); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr>
        <td></td>
        <td colspan="11" align="center" style="vertical-align:middle;font-size: 150" width="200" height="30"><strong>CANDIDATOS CANCELADOS</strong></td>
        <td></td>
    </tr>
</table>
<table width="100%" class="table-report-excel" >

  <tr>
    <th width="12">N°</th>
    <th width="12">DNI</th>
    <th width="25">APELLIDO PATERNO</th>
    <th width="25">APELLIDO MATERNO</th>
    <th width="15">NOMBRES</th>
    <th width="15">CARGO</th>
    <th width="32">ORGANIZACIÓN POLÍTICA</th>
    <th width="25">ODPE</th>
    <th width="15">TIP. ORG. POL.</th>
    <th width="12">UBIGEO</th>
    <th width="25">DEPARTAMENTO</th>
    <th width="25">PROVINCIA</th>
    <th width="25">DISTRITO</th>
    <th width="25">MOTIVO</th>
  </tr>{{$i=1; }}
  @foreach ($data as $col)
  <tr>
    <td width="12">{{$i++; }}&nbsp;</td>
    <td width="12">{{$col->c_dni }}&nbsp;</td>
    <td width="25">{{$col->c_apellido_paterno }}</td>
    <td width="25">{{$col->c_apellido_materno }}</td>
    <td width="15">{{$col->c_nombres }}</td>
    <td width="15">{{$col->cargo}}</td>
    <td width="32">{{$col->organizacion }}</td>
    <td width="25">{{$col->odpe }}&nbsp;</td>
    <td width="15">{{$col->tip_org }}&nbsp;</td>
    <td width="12">{{$col->c_ubigeo }}&nbsp;</td>
    <td width="25">{{$col->departamento }}&nbsp;</td>
    <td width="25">{{$col->provincia }}&nbsp;</td>
    <td width="25">{{$col->distrito }}&nbsp;</td> 
    <td width="25">{{$col->motivo }}&nbsp;</td>
  </tr>
  @endforeach
</table>

</body>
</html>